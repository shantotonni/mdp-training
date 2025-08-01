<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContSupervisorResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\Export\ExportManagementDevelopmentPlaneDetailsCollection;
use App\Http\Resources\MDP\ManagementDevelopmentPlaneCollection;
use App\Http\Resources\MDP\ManagementDevelopmentPlaneResource;
use App\Http\Resources\MDP\ManagementDevelopmentPlanPrintCollection;
use App\Http\Resources\SupervisorResource;
use App\Mail\MDPCreateMail;
use App\Models\ContactPersonal;
use App\Models\Department;
use App\Models\Employee;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPEmployeeTrainingList;
use App\Models\MDPPersonalInitiative;
use App\Models\MDPTraining;
use App\Models\TrainingName;
use App\Traits\MDPCommonTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class MDPController extends Controller
{
    use MDPCommonTrait;
    public function index(Request $request)
    {

        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        $status = $request->status;

        $session = $request->sessionP;
        if ($role == 'admin'){

            $mdp = ManagementDevelopmentPlane::query();
            $Business = json_decode($request->Business);
            $Department = json_decode($request->Department);


            if (empty($Department)){

                if (!empty($Business) && isset($Business)) {
                    $Business = collect($Business);

                    // Optional: clean up DeptName values if needed
                    $Business = $Business->map(function ($item) {
                        $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                        $item->business = preg_replace('/\s+/', ' ', $item->business);
                        $item->business = trim($item->business);
                        return $item;
                    });

                    $BusinessName = $Business->pluck('business');

                    $Departments = Department::select('DeptName')->whereIn('DeptUnit',$BusinessName->toArray())->get();
                    $deptlist=[];
                    foreach ($Departments as $val) {
                        $deptlist[] = $val->DeptName;
                    }

                    $mdp = $mdp->whereIn('Department', $deptlist);
                }
            }else{

                if (!empty($Department) && isset($Department)) {
                    $Department = collect($Department);

                    // Optional: clean up DeptName values if needed
                    $Department = $Department->map(function ($item) {
                        $item->DeptName = preg_replace('/\s+and\s+/i', ' & ', $item->DeptName);
                        $item->DeptName = preg_replace('/\s+/', ' ', $item->DeptName);
                        $item->DeptName = trim($item->DeptName);
                        return $item;
                    });
                    $DeptName = $Department->pluck('DeptName');

                    $mdp = $mdp->whereIn('Department', $DeptName->toArray());
                }
            }


            $EmployeeList= json_decode($request->EmployeeList);
            if (!empty($EmployeeList) && isset($EmployeeList)){
                $EmployeeList = collect($EmployeeList);
                $EmployeeIDs = $EmployeeList->pluck('StaffID');
                $mdp = $mdp->whereIn('StaffID',$EmployeeIDs);
            }
            if ($session){
                $mdp = $mdp->where('AppraisalPeriod',$session);
            }
            $mdp = $mdp->orderBy('ID','desc')->whereNotNull('StaffID');
        }else{

            $mdp = ManagementDevelopmentPlane::query();
            $Department = json_decode($request->Department);
            if (!empty($Department) && isset($Department)){
                $Department = collect($Department);
                $DeptName = $Department->pluck('DeptName');
                $mdp = $mdp->whereIn('Department',$DeptName);
            }
            if ($session){
                $mdp = $mdp->where('AppraisalPeriod',$session);
            }
            $mdp = $mdp->orderBy('ID','desc')
                ->where(function ($query) use($empcode){
                    $query->where('StaffID',$empcode);
                    $query->orWhere('SuppervisorStaffID', $empcode);
                })
                ->whereNotNull('StaffID');
        }
        if ($status){
            $mdp->where('MDPStatus','=',$status);
        }
        $mdpIds = $mdp->pluck('ID')->implode(',');

        return new ManagementDevelopmentPlaneCollection($mdp->paginate(15),$mdpIds);
    }
    public function notSubmittedIndex(Request $request)
    {
        $session = $request->sessionP;

        $Business = json_decode($request->Business);
        $Department = json_decode($request->Department);


        $employees = DB::table('MDPEligibleList as ME')

            ->leftJoin('ManagementDevelopmentPlane as M', function ($join) use ($session) {
                $join->on('ME.StaffID', '=', 'M.StaffID')
                    ->where('M.AppraisalPeriod', '=', $session);
            })
            ->join('Personal as P', 'P.EmpCode', '=', 'ME.StaffID')
            ->join('Employer as E', 'E.EmpCode', '=', 'P.EmpCode')
            ->join('Designation as D', 'D.DesgCode', '=', 'E.DesgCode')
            ->join('Department as DP', 'DP.DeptCode', '=', 'E.DeptCode')
            ->leftJoin('EmployeeEmailId as EM', 'EM.EmpCode', '=', 'P.EmpCode')
            ->whereNull('M.StaffID')
            ->where('ME.Period', '=', '2025-2026')
            ->orderBy('P.EmpCode','asc')
            ->select([
                'P.EmpCode as StaffID',
                'P.Name',
                'D.DesgName as Designation',
                'DP.DeptName as Department',
                'DP.DeptUnit as Business',
                'EM.EmailID as Email',
                'P.MobileNo as Mobile',
                'P.Active',
                DB::raw("'$session' as AppraisalPeriod")
            ]);

        if (empty($Department)){

            if (!empty($Business) && isset($Business)) {
                $Business = collect($Business);

                // Optional: clean up DeptName values if needed
                $Business = $Business->map(function ($item) {
                    $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                    $item->business = preg_replace('/\s+/', ' ', $item->business);
                    $item->business = trim($item->business);
                    return $item;
                });

                $BusinessName = $Business->pluck('business');

                $Departments = Department::select('DeptName')->whereIn('DeptUnit',$BusinessName->toArray())->get();
                $deptlist=[];
                foreach ($Departments as $val) {
                    $deptlist[] = $val->DeptName;
                }

                $employees = $employees->whereIn('DP.DeptName', $deptlist);
            }
        }else{

            if (!empty($Department) && isset($Department)) {
                $Department = collect($Department);

                // Optional: clean up DeptName values if needed
                $Department = $Department->map(function ($item) {
                    $item->DeptName = preg_replace('/\s+and\s+/i', ' & ', $item->DeptName);
                    $item->DeptName = preg_replace('/\s+/', ' ', $item->DeptName);
                    $item->DeptName = trim($item->DeptName);
                    return $item;
                });
                $DeptName = $Department->pluck('DeptName');

                $employees = $employees->whereIn('DP.DeptName', $DeptName->toArray());
            }
        }
        $EmployeeList= json_decode($request->EmployeeList);
        if (!empty($EmployeeList) && isset($EmployeeList)){
            $EmployeeList = collect($EmployeeList);
            $EmployeeIDs = $EmployeeList->pluck('StaffID');
            $employees = $employees->whereIn('StaffID',$EmployeeIDs);
        }

        return response()->json([
           'status'=>'success',
            'exportdata'=>$employees->get(),
           'data'=>$employees->paginate(15)


        ]);

    }
    public function getMDPEligibleList(Request $request){
        $empCode =$request->empcode;
        $period =$request->Period;
        $list = $this->mdpEligibleList($empCode,$period);
        if (!empty($list)){
            return response()->json([
               'status'=>'success',
               'message'=>'Welcome To MDP Training'
            ]);
        }else{


            return response()->json([
               'status'=>'error',
               'message'=>'Welcome To MDP Training!',
               'data'=>[
                   [
                       'Name'=>'Shafique Mohammod Mostafaa',
                       'Designation'=>'Manager, Training',
                       'Contact'=>'01709644143',
                       'ExtNo'=>'154',
                       'Email'=>'shafique@aci-bd.com'
                   ],
                   [
                       'Name'=>'Mohammad Shahadat Ullah',
                       'Designation'=>'Deputy Manager, Training',
                       'Contact'=>'01708467576',
                       'ExtNo'=>'154',
                       'Email'=>'shahadatullah@aci-bd.com'
                   ]
               ]
            ]);

        }
    }

    public function store(Request  $request){

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'AppraisalPeriod'   =>'required',
                'StaffID'           =>'required',
                'EmployeeName'      =>'required',
                'Designation'       =>'required',
                'Department'        =>'required',
                'OfficialEmail'     =>'required',
                'Mobile'            =>'required|min:11|max:11',
                'JoiningDate'       =>'required',
                'CurrentPosition'   =>'required',
                'Qualification'     =>'required',
                'SuppervisorStaffID'=>'required',
                'SuppervisorEmail'  =>'required',
                'Signature'         =>'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()]);
            }

            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload->get('EmpCode');
            $role = $payload->get('Type');
            if ($role != 'admin'){
                if ($empcode != $request->StaffID){
                    return response()->json([
                        'status' => 'error',
                        'message' => 'You Cant Add Another Person Data'
                    ]);
                }
            }

            if ($request->StaffID == 'admin'){
                if ($empcode != $request->StaffID){
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Same Employee Code'
                    ]);
                }
            }

            $exist_check = ManagementDevelopmentPlane::where('AppraisalPeriod',$request->AppraisalPeriod)->where('StaffID',$request->StaffID)->exists();
            if ($exist_check){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Already Exists.'
                ]);
            }
            $initiative = $request->initiative;
            $training = $request->training;
            // Validate image dimensions
            $imageDimantion = Image::make($request->file('Signature'));
            if ($imageDimantion->width() != 200 || $imageDimantion->height() != 60) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Image dimensions must be 200x60 pixels.'
                ]);
            }

            if ($request->hasFile('Signature')) {
                $file = $request->file('Signature');

                // Create a unique name with extension
                $filename = 'signature_' . time() . '.' . $file->getClientOriginalExtension();
                $destination = public_path('signature');

                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }
                Image::make($file)->encode('jpeg', 95)->save(public_path('signature/').$filename);

            } else {
                $filename = '';
            }

            $ManagementDevelopmentPlane = new ManagementDevelopmentPlane();
            $ManagementDevelopmentPlane->AppraisalPeriod = $request->AppraisalPeriod;
            $ManagementDevelopmentPlane->StaffID = $request->StaffID;
            $ManagementDevelopmentPlane->EmployeeName = $request->EmployeeName;
            $ManagementDevelopmentPlane->Designation = $request->Designation;
            $ManagementDevelopmentPlane->Department = $request->Department;
            $ManagementDevelopmentPlane->Business = $request->Business;
            $ManagementDevelopmentPlane->OfficialEmail = $request->OfficialEmail;
            $ManagementDevelopmentPlane->Mobile = $request->Mobile;
            $ManagementDevelopmentPlane->DateOfBirth = date('Y-m-d',strtotime($request->DateOfBirth));
            $ManagementDevelopmentPlane->JoiningDate = date('Y-m-d H:i:s', strtotime($request->JoiningDate))  ;
            $ManagementDevelopmentPlane->CurrentPosition = $request->CurrentPosition;
            $ManagementDevelopmentPlane->PresentJobStartedOn = date('Y-m-d H:i:s', strtotime($request->PresentJobStartedOn));
            $ManagementDevelopmentPlane->Qualification = $request->Qualification;
            $ManagementDevelopmentPlane->SuppervisorStaffID = $request->SuppervisorStaffID;
            $ManagementDevelopmentPlane->SuppervisorName = $request->SuppervisorName;
            $ManagementDevelopmentPlane->SuppervisorDesignation = $request->SuppervisorDesignation;
            $ManagementDevelopmentPlane->SuppervisorEmail = $request->SuppervisorEmail;
            $ManagementDevelopmentPlane->SuppervisorMobile = $request->SuppervisorMobile;
            $ManagementDevelopmentPlane->AreaOne = $request->futureTrainingTitleOne;
            $ManagementDevelopmentPlane->AreaTwo = $request->futureTrainingTitleTwo;
            $ManagementDevelopmentPlane->CreatedBy = $empcode;
            $ManagementDevelopmentPlane->CreatedDate = Carbon::now();
            $ManagementDevelopmentPlane->UpdatedBy = $empcode;
            $ManagementDevelopmentPlane->UpdatedDate =  Carbon::now();
            $ManagementDevelopmentPlane->MDPStatus = 'Pending';
            $ManagementDevelopmentPlane->Signature = $filename;
            $ManagementDevelopmentPlane->FutureTrainingOneDetails = $request->FutureTrainingOneDetails;
            $ManagementDevelopmentPlane->FutureTrainingTwoDetails = $request->FutureTrainingTwoDetails;

            if ($ManagementDevelopmentPlane->save()){
                foreach ($initiative as $value){
                    $MDPPersonalInitiative = new MDPPersonalInitiative();
                    $MDPPersonalInitiative->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPPersonalInitiative->Name  = $value['Name'];
                    $MDPPersonalInitiative->Type  = $value['Type'];
                    $MDPPersonalInitiative->Date = !empty($value['Date']) ? date("Y-m-d H:i:s", strtotime($value['Date'])) : null;

                    $MDPPersonalInitiative->save();
                }
                foreach ($training as $item){
                    $MDPTraining = new MDPTraining();
                    $MDPTraining->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPTraining->TrainingCode  = $item['TrainingCode'];
                    $MDPTraining->TrainingTitle = $item['TrainingTitle'];
                    $MDPTraining->TrainingType = $item['TrainingType'];
                    $MDPTraining->TrainingDate = date('Y-m-d H:i:s', strtotime($item['TrainingDate']))  ;
                    $MDPTraining->save();
                }

                DB::commit();

                // Mail পাঠানোর অংশ Transaction এর বাইরে
                try {
                    $email = $request->SuppervisorEmail;
                    $explode = explode('@', $email);

                    if ($explode[1] === 'aci-bd.com') {
                        Config::set('mail.mailers.smtp.host', 'mail.aci-bd.com');
                    } else {
                        Artisan::call('config:clear');
                        Artisan::call('cache:clear');
                        Artisan::call('config:cache');
                        Artisan::call('optimize');
                        Config::set('mail.mailers.smtp.host', 'smtp.agni.com');
                    }

                    Mail::to($email)->send(new MDPCreateMail('MDP Submitted!', $request->EmployeeName, $request->Designation));

                } catch (\Exception $mailEx) {
                    \Log::error('Mail Sending Failed: ' . $mailEx->getMessage());
                }

//                $email = $request->SuppervisorEmail;
//                $explode = explode('@', $email);
//                if ($explode[1] === 'aci-bd.com') {
//                    Config::set('mail.mailers.smtp.host', 'mail.aci-bd.com');
//
//                    $data = 'MDP Submitted!';
//                    Mail::to($email)->send(new MDPCreateMail($data, $request->EmployeeName, $request->Designation ));
//                }
//                else {
//                    Artisan::call('config:clear');
//                    Artisan::call('cache:clear');
//                    Artisan::call('config:cache');
//                    Artisan::call('optimize');
//                    Config::set('mail.mailers.smtp.host', 'smtp.agni.com');
//                }
//                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully Submitted.'
                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage(),

            ],500);
        }
    }

    public function update(Request $request){
        DB::beginTransaction();
        try {
        $validator = Validator::make($request->all(), [
            'AppraisalPeriod'   =>'required',
            'StaffID'           =>'required',
            'EmployeeName'      =>'required',
            'Designation'       =>'required',
            'Department'        =>'required',
            'Mobile'            =>'required|min:11|max:11',
            'JoiningDate'       =>'required',
            'CurrentPosition'   =>'required',
            'Qualification'     =>'required',
            'SuppervisorEmail'=>'required',
            'SuppervisorStaffID'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()]);
        }


            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];

            $initiative = $request->initiative;
            $training = $request->training;

            $ManagementDevelopmentPlane = ManagementDevelopmentPlane::where('ID',$request->ID)->first();
            MDPPersonalInitiative::where('MDPID',$request->ID)->delete();
            MDPTraining::where('MDPID',$request->ID)->delete();

            if ($request->hasFile('Signature')) {
                $imageDimantion = Image::make($request->file('Signature'));

                if ($imageDimantion->width() != 200 || $imageDimantion->height() != 60) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Image dimensions must be 200x60 pixels.'
                    ]);
                }

                $file = $request->file('Signature');

                // Create a unique name with extension
                $filename = 'signature_' . time() . '.' . $file->getClientOriginalExtension();
                $destination = public_path('signature/');
                //code for remove old file
                if ($ManagementDevelopmentPlane->Signature != '' && $ManagementDevelopmentPlane->Signature != null) {
                    $file_old = $destination . $ManagementDevelopmentPlane->Signature;
                    if (file_exists($file_old)) {
                        unlink($file_old);
                    }
                }

                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                Image::make($file)->encode('jpeg', 95)->save(public_path('signature/').$filename);

            } else {
                $filename = $ManagementDevelopmentPlane->Signature;
            }

            $ManagementDevelopmentPlane->AppraisalPeriod = $request->AppraisalPeriod;
            $ManagementDevelopmentPlane->StaffID = $request->StaffID;
            $ManagementDevelopmentPlane->EmployeeName = $request->EmployeeName;
            $ManagementDevelopmentPlane->Designation = $request->Designation;
            $ManagementDevelopmentPlane->Department = $request->Department;
            $ManagementDevelopmentPlane->OfficialEmail = $request->OfficialEmail;
            $ManagementDevelopmentPlane->Mobile = $request->Mobile;
            $ManagementDevelopmentPlane->DateOfBirth = date('Y-m-d',strtotime($request->DateOfBirth));
            $ManagementDevelopmentPlane->JoiningDate = date('Y-m-d',strtotime($request->JoiningDate));
            $ManagementDevelopmentPlane->CurrentPosition = $request->CurrentPosition;
            $ManagementDevelopmentPlane->PresentJobStartedOn = date('Y-m-d',strtotime($request->PresentJobStartedOn));
            $ManagementDevelopmentPlane->Qualification = $request->Qualification;

            $ManagementDevelopmentPlane->SuppervisorStaffID = $request->SuppervisorStaffID;
            $ManagementDevelopmentPlane->SuppervisorName = $request->SuppervisorName;
            $ManagementDevelopmentPlane->SuppervisorDesignation = $request->SuppervisorDesignation;
            $ManagementDevelopmentPlane->SuppervisorEmail = $request->SuppervisorEmail;
            $ManagementDevelopmentPlane->SuppervisorMobile = $request->SuppervisorMobile;
            $ManagementDevelopmentPlane->AreaOne = $request->futureTrainingTitleOne;
            $ManagementDevelopmentPlane->AreaTwo = $request->futureTrainingTitleTwo;
            $ManagementDevelopmentPlane->FutureTrainingOneDetails = $request->FutureTrainingOneDetails;
            $ManagementDevelopmentPlane->FutureTrainingTwoDetails = $request->FutureTrainingTwoDetails;
            $ManagementDevelopmentPlane->Signature = $filename;

            $ManagementDevelopmentPlane->UpdatedBy = $empcode;
            $ManagementDevelopmentPlane->UpdatedDate = Carbon::now();

            if ($ManagementDevelopmentPlane->save()){
                foreach ($initiative as $value){
                    $MDPPersonalInitiative = new MDPPersonalInitiative();
                    $MDPPersonalInitiative->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPPersonalInitiative->Name  = $value['Name'];
                    $MDPPersonalInitiative->Type  = $value['Type'];
                    $MDPPersonalInitiative->Date  =  date("Y-m-d H:i:s", strtotime($value['Date'])) ;
                    $MDPPersonalInitiative->save();
                }

                foreach ($training as $item){

                    $MDPTraining = new MDPTraining();
                    $MDPTraining->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPTraining->TrainingCode  = $item['TrainingCode'];
                    $MDPTraining->TrainingTitle = $item['TrainingTitle'];
                    $MDPTraining->TrainingType = $item['TrainingType'];
                    $MDPTraining->TrainingDate = date('Y-m-d H:i:s', strtotime($item['TrainingDate']))  ;
                    $MDPTraining->save();
                }

                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully Updated.'
                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function edit($id, $year){
        $mdp = ManagementDevelopmentPlane::where('ID',$id)->with('initiative','training','employee')->first();

        $training_list = MDPEmployeeTrainingList::where('StaffID', $mdp->StaffID)->where('isDropDown','Y')->first();

        if (!empty($training_list)){
            $dropDown = 'YES';
        }else{
            $dropDown = 'NO';
        }

        $training_list_by_empcode = MDPEmployeeTrainingList::where('StaffID', $mdp->StaffID)->get();

        $dateFrom =  Carbon::now()->year -5;
        $dateTo =  Carbon::now()->year;
//        $training_history = DB::select("EXEC SP_TrainingUserReport '$mdp->StaffID','$dateFrom','$dateTo' ");
        $training_history= DB::select("exec SP_doLoadMDPFiveYearsTraining '$mdp->StaffID'");

        return response()->json([
            'training_list'=>$training_list_by_empcode,
            'training_history'=>$training_history,
            'dropDown'=>$dropDown,
            'data'=>new ManagementDevelopmentPlaneResource($mdp)
        ]);
    }

    public function testsendemail(){

        //$data = array();
        //$data['to'] = $to;
        //$data['emailbody'] = $emailbody;
        //$html = $this->load->view('email_body', $data, TRUE);
        $html = 'Test email';
        //print_r($to); exit();
        $this->load->library('phpmailer');
        //$to = 'faysalahmed@aci-bd.com';
        //$to = 'faysal.ahmed7212@gmail.com';
        $to = 'sandip@acilogistics.net';
        $subject = "ACI Approval System";

        $this->email = new PHPMailer(true);
        $this->email->IsSMTP(true); // telling the class to use SMTP
        $this->email->IsHTML(true); // telling the class to use HTML
        //$this->email->Host = "smtp.agni.com"; // SMTP server

        $emailext = explode('@',$to);
        if($emailext[1] == 'aci-bd.com'){
            $this->email->Host = "192.168.1.30"; // SMTP server
        }else{
            $this->email->Host = "smtp.agni.com"; // SMTP server
        }
        $this->email->Port = 25;

        $this->email->SetFrom('faysalahmed@aci-bd.com', $subject);
        $this->email->AddReplyTo('faysalahmed@aci-bd.com', $subject);


        $this->email->AddAddress($to);

        $this->email->Subject = $subject;
        $this->email->MsgHTML($html);
        //print_r($this->email->Send()); exit();
        if ($this->email->Send()) {
            //print "Done";
        } else {
            //print "Failed";
        }

    }

    public function delete($id){
        DB::beginTransaction();
        try {
            MDPTraining::where('MDPID',$id)->delete();
            MDPPersonalInitiative::where('MDPID',$id)->delete();
            ManagementDevelopmentPlane::where('ID',$id)->delete();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully Deleted.'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function print($id){
        $mdp = ManagementDevelopmentPlane::where('ID',$id)->with('initiative','training')->first();
        return new ManagementDevelopmentPlaneResource($mdp);
    }

    public function allMDPPrint(Request $request){
        $mdpIds = array_map('intval', explode(',', $request->mdpIds));

        $allMdp = collect();

        foreach (array_chunk($mdpIds, 1000) as $chunk) {
            $mdp = ManagementDevelopmentPlane::whereIn('ID', $chunk)
                ->with('initiative', 'training')
                ->get();
            $allMdp = $allMdp->merge($mdp);
        }

        return new ManagementDevelopmentPlanPrintCollection($allMdp);

    }

    public function mdpExport(Request $request){
        $session = $request->sessionP;
        $Department = json_decode($request->Department);
        $mdp_list = ManagementDevelopmentPlane::query()->with('initiative','training','training.feedback');
        $Business = json_decode($request->Business);
        $status = $request->status;

        if (empty($Department)){

            if (!empty($Business) && isset($Business)) {
                $Business = collect($Business);

                // Optional: clean up DeptName values if needed
                $Business = $Business->map(function ($item) {
                    $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                    $item->business = preg_replace('/\s+/', ' ', $item->business);
                    $item->business = trim($item->business);
                    return $item;
                });

                $BusinessName = $Business->pluck('business');

                $Departments = Department::select('DeptName')->whereIn('DeptUnit',$BusinessName->toArray())->get();
                $deptlist=[];
                foreach ($Departments as $val) {
                    $deptlist[] = $val->DeptName;
                }

                $mdp_list = $mdp_list->whereIn('Department', $deptlist);
            }
        }else{

            if (!empty($Department) && isset($Department)) {
                $Department = collect($Department);

                // Optional: clean up DeptName values if needed
                $Department = $Department->map(function ($item) {
                    $item->DeptName = preg_replace('/\s+and\s+/i', ' & ', $item->DeptName);
                    $item->DeptName = preg_replace('/\s+/', ' ', $item->DeptName);
                    $item->DeptName = trim($item->DeptName);
                    return $item;
                });
                $DeptName = $Department->pluck('DeptName');

                $mdp_list = $mdp_list->whereIn('Department', $DeptName->toArray());
            }
        }
        $EmployeeList= json_decode($request->EmployeeList);
        if (!empty($EmployeeList) && isset($EmployeeList)){
            $EmployeeList = collect($EmployeeList);
            $EmployeeIDs = $EmployeeList->pluck('StaffID');
            $mdp_list = $mdp_list->whereIn('StaffID',$EmployeeIDs);
        }
        if ($session){
            $mdp_list = $mdp_list->where('AppraisalPeriod',$session);
        }
        if ($status){
            $mdp_list->where('MDPStatus','=',$status);
        }
        $mdp_list = $mdp_list->where('AppraisalPeriod',$session)
            ->orderBy('Department','asc')->orderBy('ID','desc')->whereNotNull('StaffID')->get();

        return new ExportManagementDevelopmentPlaneDetailsCollection($mdp_list);

    }
//    public function mdpExport(Request $request){
//        dd($request->all());
//        $session = $request->sessionP;
//        $Department = json_decode($request->Department);
//        $mdp_list = ManagementDevelopmentPlane::query()->with('initiative','training','training.feedback');
//        if (!empty($Department) && isset($Department)){
//            $Department = collect($Department);
//            $DeptName = $Department->pluck('DeptName');
//            $mdp_list = $mdp_list->whereIn('Department',$DeptName);
//
//        }
//        $EmployeeList= json_decode($request->EmployeeList);
//        if (!empty($EmployeeList) && isset($EmployeeList)){
//            $EmployeeList = collect($EmployeeList);
//            $EmployeeIDs = $EmployeeList->pluck('StaffID');
//            $mdp_list = $mdp_list->whereIn('StaffID',$EmployeeIDs);
//        }
//        $mdp_list = $mdp_list->where('AppraisalPeriod',$session)
//            ->orderBy('Department','asc')->get();
//
//        return new ExportManagementDevelopmentPlaneDetailsCollection($mdp_list);
//
//    }
//    public function mdpDetailsExport(Request $request){
//
//
//        $session = $request->sessionP;
//        $Department = json_decode($request->Department);
//        $mdp_list = ManagementDevelopmentPlane::query()->with('initiative','training','training.feedback');
//        if (!empty($Department) && isset($Department)){
//            $Department = collect($Department);
//            $DeptName = $Department->pluck('DeptName');
//            $mdp_list = $mdp_list->whereIn('Department',$DeptName);
//        }
//        $EmployeeList= json_decode($request->EmployeeList);
//        if (!empty($EmployeeList) && isset($EmployeeList)){
//            $EmployeeList = collect($EmployeeList);
//            $EmployeeIDs = $EmployeeList->pluck('StaffID');
//            $mdp_list = $mdp_list->whereIn('StaffID',$EmployeeIDs);
//        }
//
//        $mdp_list = $mdp_list->where('AppraisalPeriod',$session)
//
//            ->orderBy('Department','asc')->get();
//        return new ExportManagementDevelopmentPlaneDetailsCollection($mdp_list);
//    }
    public function mdpDetailsExport(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        $status = $request->status;
        $session = $request->sessionP;
        $Business = json_decode($request->Business);
        $EmployeeList= json_decode($request->EmployeeList);
        $Department = json_decode($request->Department);
        $mdpIds = $this->mdpIds($empcode,$role,$status,$session,$Business,$Department,$EmployeeList);

        $sql = "SP_doLoadMDPDetailsWTraining '$mdpIds'";
        $mdps = DB::select($sql);
        return response()->json([
           'data'=>$mdps
        ]);
    }

    public function mdpFeedbackExport(Request $request){
        $feedback = DB::select(" SELECT MDP.AppraisalPeriod,MDP.StaffID,MDP.EmployeeName,MDP.Designation,MDP.Department, t.TrainingTitle,T.TrainingType,
                            ISNULL(F.DoneDate,'') AS DoneDate, ISNULL(F.Feedback, 0) AS Feedback,ISNULL(F.LearningTransfer,0) AS LearningTransfer,
                            ISNULL(F.OfferDateOne,'') AS OfferDateOne,ISNULL(F.OfferDateTwo,'') AS OfferDateTwo,
                            ISNULL(F.OfferDateThree,'') AS OfferDateThree,ISNULL(F.OfferDateFour,'') AS OfferDateFour,ISNULL(F.OfferDateFive,'') AS OfferDateFive FROM MDPTraining T
                          JOIN ManagementDevelopmentPlane MDP
                            ON MDP.ID=T.MDPID
                          LEFT JOIN MDPTrainingFeedback F
                            ON F.TrainingID = T.ID
                          WHERE TrainingTitle IS NOT NULL");
        $feedbackCollection = collect($feedback);
        return response()->json([
            'data' => $feedbackCollection
        ]);
    }
    public function getAllExistingTrainingList(Request $request){
      $list = DB::table('TrainingName')->select(
          DB::raw('TrnCode as TrainingCode,TrnName as TrainingName,CompType as CompetencyType,CompCluster as CompetencyCluster,EntryDate'))
          ->orderBy('TrnCode','desc')
          ->get();
        return response()->json([
            'data' => $list
        ]);
    }

    public function search($query){
        return new ManagementDevelopmentPlaneCollection(ManagementDevelopmentPlane::where('StaffID','LIKE',"%$query%")->latest()->paginate(10));
    }

    public function getTopRankedTraining(Request $request){
        $session = $request->sessionP;
        $top = $request->top;
        $top_training = DB::select("EXEC MDPTopRankTrainingList '$session','$top' ");
        return response()->json([
           'top_training' => $top_training
        ]);
    }

    public function getEmployeeWiseReport(Request $request){

        $session = $request->sessionP;
        $Training= json_decode($request->TrainingTitle);
        $TrainingTitle = $Training->TrainingTitle;
        $Tasks = json_decode($request->Tasks);
        if (!empty($Tasks)){

            if (!empty($Tasks) && isset($Tasks)){
                $Tasks = collect($Tasks);
                $taskName= $Tasks->pluck('task');
            }
            $taskList =[];
            foreach ($taskName as $value){
                array_push($taskList,$value);
            }
            $taskToString= implode(",", $taskList);
        }else{
            $taskToString='';
        }

        $Department = json_decode($request->SBUs);
        if (!empty($Department)){
            if (!empty($Department) && isset($Department)){
                $Department = collect($Department);
                $DeptUnit = $Department->pluck('DeptName');
            }
            $DeptUnitList =[];
            foreach ($DeptUnit as $value){
                array_push($DeptUnitList,$value);
            }
            $DeptUnitListString= implode(",", $DeptUnitList);
        }else{
            $DeptUnitListString='';
        }

        $sql= "EXEC usp_doLoadMDPTrainingWiseEmployeeList '$session','$TrainingTitle','$taskToString','$DeptUnitListString' ";

        $conn = DB::connection('sqlsrv');
        $pdo = $conn->getPdo()->prepare($sql);
        $pdo->execute();

        $res = array();

        do {
            $rows = $pdo->fetchAll(\PDO::FETCH_ASSOC);
            $res[] = $rows;

        } while ($pdo->nextRowset());
        if (!empty($res[0])){
            return response()->json([
                'status' => 'success',
                'data' =>[
                    'List'=>$res[0],
                    'Ranking'=>$res[1],
                     'UserCount'=> $res[2]
                ],
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'No Data Found',
            ]);
        }
        return response()->json([
            'individual_training' => $individual_training
        ]);
//
//        foreach($TrainingTitle as $row){
//            $TrainingTitleString = $TrainingTitleString . $row['TrainingTitle'] . '##';
//        }
//        $TrainingTitleString = substr($TrainingTitleString,0,strlen($TrainingTitleString) - 2);
//        $individual_training = DB::select("EXEC doLoadEmployeeWiseReport '$session','$EmpCode','$TrainingTitleString' ");

    }

    public function getEmployeeIndividualTraining(Request $request){
        $session = $request->sessionP;
        $EmpCode = $request->EmpCode;
        $individual_training = DB::select("EXEC EmployeeIndividualTraining '$session','$EmpCode' ");
        return response()->json([
           'individual_training' => $individual_training
        ]);
    }
    public function getAllMDPBusiness(Request $request){

        $sessionP = session('sessionP');

        $business = DB::table('ManagementDevelopmentPlane as mdp')
            ->join('Employer as e', function ($join) use ($sessionP) {
                $join->on('e.EmpCode', '=', 'mdp.StaffID');
                if ($sessionP) {
                    $join->where('mdp.AppraisalPeriod', '=', $sessionP);
                }
            })
            ->join('Department as d', 'd.DeptCode', '=', 'e.DeptCode')
            ->where(function ($query) {
                $query->whereNotNull('d.DeptName')
                    ->orWhere('d.DeptName', '<>', '');
            })
            ->select(DB::raw("distinct d.DeptUnit as business"))
            ->orderBy('d.DeptUnit', 'ASC')
            ->get();


        return response()->json([
            'business'=>$business
        ]);
    }

    public function getAllMDPDepartment(Request $request)
    {
        $sessionP = session('sessionP');
        $Business = json_decode($request->Business);
        $deptlist = [];

        // Process business names
        if (!empty($Business)) {
            $Business = collect($Business)->map(function ($item) {
                $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                $item->business = preg_replace('/\s+/', ' ', $item->business);
                $item->business = trim($item->business);
                return $item;
            });

            $BusinessNames = $Business->pluck('business')->toArray();

            // Fetch related departments
            $Departments = Department::select('DeptName')
                ->whereIn('DeptUnit', $BusinessNames)
                ->get();

            $deptlist = $Departments->pluck('DeptName')->toArray();
        }

        // Fetch final department list
        $departmentData = DB::table('ManagementDevelopmentPlane as mdp')
            ->join('Employer as e', function ($join) use ($sessionP) {
                $join->on('e.EmpCode', '=', 'mdp.StaffID');
                if ($sessionP) {
                    $join->where('mdp.AppraisalPeriod', '=', $sessionP);
                }
            })
            ->join('Department as d', 'd.DeptCode', '=', 'e.DeptCode')
            ->where(function ($query) {
                $query->whereNotNull('d.DeptName')
                    ->where('d.DeptName', '<>', '');
            });

        if (!empty($deptlist)) {
            $departmentData->whereIn('d.DeptName', $deptlist);
        }

        $departments = $departmentData
            ->select(DB::raw("DISTINCT d.DeptCode, REPLACE(d.DeptName, '&', 'and') as DeptName"))
            ->orderBy(DB::raw("REPLACE(d.DeptName, '&', 'and')"), 'ASC')
            ->get();

        return response()->json([
            'departments' => $departments
        ]);
    }


    public function getAllMDPEmployee(Request $request)
        {
            $staffId = $request->staffId;
            $session = $request->sessionP;
            $departments = json_decode($request->Department);
            $Business = json_decode($request->Business);
            $deptlist = [];

            $empList = DB::table('ManagementDevelopmentPlane as mdp')
                ->select(DB::raw("DISTINCT mdp.StaffID, CONCAT(mdp.StaffID, '- ', mdp.EmployeeName) AS Employee"))
                ->join('Personal as p', 'p.EmpCode', '=', 'mdp.StaffID')->where('p.Active', '=', 'Y')
                ->join('Employer as e', function ($join) use ($session) {
                    $join->on('e.EmpCode', '=', 'mdp.StaffID');
                    if (!empty($session)) {
                        $join->where('mdp.AppraisalPeriod', '=', $session);
                    }
                });

            // Apply department filtering if provided
            if (!empty($departments)) {
                $deptlist = collect($departments)->pluck('DeptCode');

            }elseif(!empty($Business)){
                $Business = collect($Business)->map(function ($item) {
                    $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                    $item->business = preg_replace('/\s+/', ' ', $item->business);
                    $item->business = trim($item->business);
                    return $item;
                });

                $BusinessNames = $Business->pluck('business')->toArray();

                // Fetch related departments
                $Departments = Department::select('DeptCode')
                    ->whereIn('DeptUnit', $BusinessNames)
                    ->get();

                $deptlist = $Departments->pluck('DeptCode')->toArray();
            }

            if ($deptlist){
                $empList = $empList
                    ->join('Department as d', 'd.DeptCode', '=', 'e.DeptCode')
                    ->where(function ($query) {
                        $query->whereNotNull('d.DeptName')
                            ->orWhere('d.DeptName', '<>', '');
                    })
                    ->whereIn('d.DeptCode', $deptlist);
            }

            $employees = $empList
                ->whereNotNull('mdp.StaffID')
                ->orderBy('mdp.StaffID', 'ASC')
                ->get();

            return response()->json([
                'employees' => $employees
            ]);
        }
//$staffId = $request->staffId;
//$session = $request->sessionP;
//$Department = json_decode($request->Department);
//dd($Department);
//$emp_List = ManagementDevelopmentPlane::select(DB::raw("Distinct StaffID,CONCAT(StaffID, '- ', EmployeeName) AS Employee"));
//if (!empty($session)){
//$emp_List ->where(function ($q) use ($session) {
//                    $q->where('AppraisalPeriod', 'like', '%' . $session . '%');
//                });
//}
//if (!empty($Department) && isset($Department)){
//    $Department = collect($Department);
//    $DeptName = $Department->pluck('DeptName');
//    $emp_List = $emp_List->whereIn('Department',$DeptName);
//}
//return response()->json([
//    'employees'=>$emp_List->whereNotNull('StaffID')->orderby('StaffID','ASC')->get()
//]);

    public function getAllTrainingTitle(Request $request){
        //working on it 25
//        dd($request->session);
        $period = $request->sessionP;
        $session = substr($period, 0, 4);

        $mdp = ManagementDevelopmentPlane::select(DB::raw("left(AppraisalPeriod,4) AS AppraisalPeriod"))
                ->where(DB::raw("left(AppraisalPeriod,4)"),'=',$session)->orderbydesc('ID')->first();


        if ($mdp->AppraisalPeriod < '2025'){
            $Training= DB::table('MDPTraining')
                ->select('TrainingTitle', DB::raw('NULL as TrainingCode'))
                ->whereNotNull('TrainingTitle')
                ->distinct()
                ->orderBy('TrainingTitle', 'ASC')
                ->get();
        }else{
            $Training = TrainingName::Select(DB::raw("TrnCode as TrainingCode,TrnName as TrainingTitle"))
                         ->orderBy('TrnName', 'ASC')
                        ->distinct()
                        ->get();
        }
        return response()->json([
            'trainingtitle'=>$Training
        ]);
    }

    public function getNewTrainingOfferedList2025(Request $request){
        $period = $request->Period;
        $empcode = $request->StaffID;
        $List = DB::select(DB::raw("exec usp_doLoadMDPEmployeeTrainingList '$period','$empcode'" ));
        return response()->json([
            'data'=>$List
        ]);
    }

    public function getEmployeeByEmployeeCode(Request $request){
        $empcode = $request->EmpCode;
        $empcodelength = strlen($empcode);
        if ($empcodelength == 3){
            $empcode = '00'.$empcode;
        }elseif ($empcodelength == 4){
            $empcode = '0'.$empcode;
        }else{
            $empcode = $empcode;
        }
        if ($empcode){
            $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education','emphist','grade')->first();
            $dateFrom =  Carbon::now()->year -5;
            $dateTo =  Carbon::now()->year;
            //prev
//            $training_history = DB::select("EXEC SP_TrainingUserReport '$empcode','$dateFrom','$dateTo' ");

            $training_list = MDPEmployeeTrainingList::where('StaffID', $empcode)->where('isDropDown','Y')->first();

            if (!empty($training_list)){
                $dropDown = 'YES';
            }else{
                $dropDown = 'NO';
            }

            $mdp = ManagementDevelopmentPlane::where('StaffID',$empcode)->get()->pluck('ID');
            $doneTraining = MDPTraining::query()->whereIn('MDPID',$mdp)
                ->select('MDPTraining.ID','MDPTraining.TrainingTitle','MDPTrainingFeedback.Status')
                ->leftJoin('MDPTrainingFeedback','MDPTrainingFeedback.TrainingID','=','MDPTraining.ID')
                ->where('MDPTrainingFeedback.Status','=', 'done')
                ->get();

            $training_list_by_empcode = MDPEmployeeTrainingList::where('StaffID', $empcode)->get();

            $dup = array();
            if (!empty($doneTraining) && isset($doneTraining) && $doneTraining == ''){
                foreach ($doneTraining as $k => $v) {
                    foreach ($training_list_by_empcode as $key => $value) {
                        if ($k != $key && $v->TrainingTitle != $value->TrainingTitle) {
                            if (in_array( $value, $dup) ) {
                                unset($training_list_by_empcode[$k]);
                            } else {
                                $dup[] = $value;
                            }
                        }
                    }
                }

            }else{
                $dup = $training_list_by_empcode;
            }
            $MDPAppraisalPeriod = ManagementDevelopmentPlane::select(DB::raw("left(AppraisalPeriod,4) as thisYear,Right(AppraisalPeriod,4) as NextYear"))
                ->where('StaffID', $empcode)->orderby('ID','DESC')->first();
            if (!empty($MDPAppraisalPeriod)){
                $nextYear=($MDPAppraisalPeriod->NextYear)+1;
                $period = ($MDPAppraisalPeriod->NextYear).'-'.$nextYear;
            }else{
                $prevYear=date('Y', strtotime('-1 year'));
                $nextYear=date('Y', strtotime('+1 year'));
                $period= date('Y').'-'.$nextYear;
            }

            $training_history= DB::select("exec SP_doLoadMDPFiveYearsTraining '$empcode'");
            $list = DB::select(DB::raw("exec usp_doLoadMDPEmployeeTrainingList '$request->Period','$empcode'" ));
            //dd($nextYear);

            $newMdp = ManagementDevelopmentPlane::query()->where('AppraisalPeriod','=',$request->Period)->where('StaffID','=',$empcode)->first();
            if ($newMdp == null){
                if (!empty($list)){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Welcome To MDP Training',
                        'employee'=>new EmployeeResource($employee),
//                        'training_history'=>$training_history,
                        'training_list'=>$dup,
                        'dropDown'=>$dropDown,
                        'period'=>'2025-2026',
                    ]);
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message'=>'Welcome To MDP Training Form!',
                        'data'=>'notEligible'
                    ]);
                }
            }else{
                return response()->json([
                    'status'=>'error',
                    'message'=>'You have already submitted the MDP for this Year!',
                    'data'=>'alreadySubmitted'
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'EmpCode Not Found'
            ]);
        }
    }

    public function getExportTrainingHistory(Request $request){
        $empcode= $request->empcode;

        $result= DB::select("exec SP_doLoadMDPFiveYearsTraining '$empcode'");
        return response()->json([
            'training_history' => $result,
        ]);
    }

    function exportexcel($result, $filename){
        $arrayheading[0] = !empty($result) ? array_keys($result[0]) : [];
        $result = array_merge($arrayheading, $result);
        header("Content-Disposition: attachment; filename=\"{$filename}.xls\"");
        header("Content-Type: application/vnd.ms-excel;");
        header("Pragma: no-cache");
        header("Expires: 0");
        $out = fopen("php://output", 'w');
        foreach ($result as $data) {
            fputcsv($out, $data, "\t");
        }
        fclose($out);
        exit();
    }

    public function getSupervisorByEmployeeCode(Request $request){
        if ($request->SuperVisorEmpCode === $request->EmpCode){
            return response()->json([
                'status' => 'error',
                'message' => 'Same Employee Code'
            ]);
        }
        $empcode = $request->SuperVisorEmpCode;
        $empcodelength = strlen($empcode);
        if ($empcodelength == 3){
            $empcode = '00'.$empcode;
        }elseif ($empcodelength == 4){
            $empcode = '0'.$empcode;
        }else{
            $empcode = $empcode;
        }

        $first_character = mb_substr($request->SuperVisorEmpCode, 0, 1);
        if ($first_character !== 'C'){

            if (Employee::where('EmpCode', $empcode)->exists()){
                $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education')->first();

                return response()->json([
                    'employee'=>new SupervisorResource($employee),
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Employee Code'
                ]);
            }

        }else{
            if (ContactPersonal::where('EmpCode', $empcode)->exists()){
                $employee = ContactPersonal::where('EmpCode', $empcode)->with('department','designation')->first();
                return response()->json([
                    'employee'=>new ContSupervisorResource($employee),
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Employee Code'
                ]);
            }

        }
    }

    public function getLevelWiseSuggestiveList($empcode){
        $suggestive_list = DB::select("EXEC usp_doLoadBDPTrainingTitel '$empcode' ");
        return response()->json([
            'suggestive_list'=>$suggestive_list,
        ]);
    }

    public function approvedMDP(Request $request)
    {
        $mdpID = $request->mdpID;
        $mdp = ManagementDevelopmentPlane::where('ID', $mdpID)->first();
        if ($mdp->MDPStatus == 'Approved'){
            $status = 'Pending';
            $approvedDate = Carbon::now();
            $message = 'Successfully Disapproved';
            $title = 'Disapproved';
        }else{
            $status = 'Approved';
            $message = 'Successfully Approved';
            $title = 'Approved';
            $approvedDate = Carbon::now();
        }
        $mdp->MDPStatus = $status;
        $mdp->ApprovedDate = $approvedDate;
        $mdp->save();
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'title' => $title,
        ]);
    }
}

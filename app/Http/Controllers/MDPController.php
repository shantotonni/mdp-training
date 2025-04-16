<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagementDevelopmentPlaneRequest;
use App\Http\Requests\ManagementDevelopmentPlaneUpdateRequest;
use App\Http\Resources\ContSupervisorResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\Export\ExportManagementDevelopmentPlaneCollection;
use App\Http\Resources\Export\ExportManagementDevelopmentPlaneDetailsCollection;
use App\Http\Resources\ManagementDevelopmentPlaneCollection;
use App\Http\Resources\ManagementDevelopmentPlaneResource;
use App\Http\Resources\SupervisorResource;
use App\Models\ContactPersonal;
use App\Models\Employee;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPEmployeeTrainingList;
use App\Models\MDPPersonalInitiative;
use App\Models\MDPTraining;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Monolog\Handler\IFTTTHandler;
use Tymon\JWTAuth\Facades\JWTAuth;

class MDPController extends Controller
{
    public function index(Request $request)
    {

        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];

        $session = $request->sessionP;

        if ($role == 'admin'){
            $mdp = ManagementDevelopmentPlane::query();
            $Department = json_decode($request->Department);
            if (!empty($Department) && isset($Department)){
                $Department = collect($Department);
                $DeptName = $Department->pluck('DeptName');
                $mdp = $mdp->whereIn('Department',$DeptName);
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
            $mdp = $mdp->orderBy('ID','desc')->paginate(15);
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
                ->paginate(15);
        }
        return new ManagementDevelopmentPlaneCollection($mdp);
    }

    public function store(ManagementDevelopmentPlaneRequest $request){
        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];
            $role = $payload['Type'];
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
            $imageDimantion = Image::make($request->Signature);
            if ($imageDimantion->width() != 200 || $imageDimantion->height() != 60) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Image dimensions must be 200x60 pixels.'
                ]);
            }

            //FOR IMAGE
            if ($request->Signature) {
                $image   = $request->Signature;
                $name    = uniqid().time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                Image::make($image)->save(public_path('signature/').$name);
            } else {
                $name = '';
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
            $ManagementDevelopmentPlane->DateOfBirth = $request->DateOfBirth;
            $ManagementDevelopmentPlane->JoiningDate = $request->JoiningDate;
            $ManagementDevelopmentPlane->CurrentPosition = $request->CurrentPosition;
            $ManagementDevelopmentPlane->PresentJobStartedOn = $request->PresentJobStartedOn;
            $ManagementDevelopmentPlane->Qualification = $request->Qualification;

            $ManagementDevelopmentPlane->SuppervisorStaffID = $request->SuppervisorStaffID;
            $ManagementDevelopmentPlane->SuppervisorName = $request->SuppervisorName;
            $ManagementDevelopmentPlane->SuppervisorDesignation = $request->SuppervisorDesignation;
            $ManagementDevelopmentPlane->SuppervisorEmail = $request->SuppervisorEmail;
            $ManagementDevelopmentPlane->SuppervisorMobile = $request->SuppervisorMobile;
            $ManagementDevelopmentPlane->AreaOne = $request->AreaOne;
            $ManagementDevelopmentPlane->AreaTwo = $request->AreaTwo;
            $ManagementDevelopmentPlane->CreatedBy = $empcode;
            $ManagementDevelopmentPlane->UpdatedBy = $empcode;
            $ManagementDevelopmentPlane->MDPStatus = 'Pending';
            $ManagementDevelopmentPlane->Signature = $name;
            $ManagementDevelopmentPlane->FutureTrainingOne = $request->FutureTrainingOne;
            $ManagementDevelopmentPlane->FutureTrainingTwo = $request->FutureTrainingTwo;
            if ($ManagementDevelopmentPlane->save()){
                foreach ($initiative as $value){
                    $MDPPersonalInitiative = new MDPPersonalInitiative();
                    $MDPPersonalInitiative->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPPersonalInitiative->Name  = $value['Name'];
                    $MDPPersonalInitiative->Type  = $value['Type'];
                    $MDPPersonalInitiative->Date  = $value['Date'];
                    $MDPPersonalInitiative->save();
                }
                foreach ($training as $item){
                    $MDPTraining = new MDPTraining();
                    $MDPTraining->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPTraining->TrainingTitle = $item['TrainingTitle'];
                    $MDPTraining->TrainingType = $item['TrainingType'];
                    $MDPTraining->TrainingDate = $item['TrainingDate'];
                    $MDPTraining->save();
                }

                $email = $request->SuppervisorEmail;
                $explode = explode('@', $email);
//                if ($explode[1] === 'aci-bd.com') {
//                    Config::set('mail.mailers.smtp.host', 'mail.aci-bd.com');
//
//                    $data = 'MDP Submitted!';
//                    Mail::to($email)->send(new MDPCreateMail($data, $request->EmployeeName, $request->Designation ));
//                }
                //else {
//                    Artisan::call('config:clear');
//                    Artisan::call('cache:clear');
//                    Artisan::call('config:cache');
//                    Artisan::call('optimize');
//                    Config::set('mail.mailers.smtp.host', 'smtp.agni.com');
//                }

                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully Submitted.'
                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
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

    public function update(ManagementDevelopmentPlaneUpdateRequest $request){

        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];

            $initiative = $request->initiative;
            $training = $request->training;

            $ManagementDevelopmentPlane = ManagementDevelopmentPlane::where('ID',$request->ID)->first();
            MDPPersonalInitiative::where('MDPID',$request->ID)->delete();
            MDPTraining::where('MDPID',$request->ID)->delete();

            $ManagementDevelopmentPlane->AppraisalPeriod = $request->AppraisalPeriod;
            $ManagementDevelopmentPlane->StaffID = $request->StaffID;
            $ManagementDevelopmentPlane->EmployeeName = $request->EmployeeName;
            $ManagementDevelopmentPlane->Designation = $request->Designation;
            $ManagementDevelopmentPlane->Department = $request->Department;
            $ManagementDevelopmentPlane->OfficialEmail = $request->OfficialEmail;
            $ManagementDevelopmentPlane->Mobile = $request->Mobile;
            $ManagementDevelopmentPlane->DateOfBirth = $request->DateOfBirth;
            $ManagementDevelopmentPlane->JoiningDate = $request->JoiningDate;
            $ManagementDevelopmentPlane->CurrentPosition = $request->CurrentPosition;
            $ManagementDevelopmentPlane->PresentJobStartedOn = $request->PresentJobStartedOn;
            $ManagementDevelopmentPlane->Qualification = $request->Qualification;

            $ManagementDevelopmentPlane->SuppervisorStaffID = $request->SuppervisorStaffID;
            $ManagementDevelopmentPlane->SuppervisorName = $request->SuppervisorName;
            $ManagementDevelopmentPlane->SuppervisorDesignation = $request->SuppervisorDesignation;
            $ManagementDevelopmentPlane->SuppervisorEmail = $request->SuppervisorEmail;
            $ManagementDevelopmentPlane->SuppervisorMobile = $request->SuppervisorMobile;
            $ManagementDevelopmentPlane->AreaOne = $request->AreaOne;
            $ManagementDevelopmentPlane->AreaTwo = $request->AreaTwo;
            $ManagementDevelopmentPlane->UpdatedBy = $empcode;
            if ($ManagementDevelopmentPlane->save()){
                foreach ($initiative as $value){
                    $MDPPersonalInitiative = new MDPPersonalInitiative();
                    $MDPPersonalInitiative->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPPersonalInitiative->Name  = $value['Name'];
                    $MDPPersonalInitiative->Type  = $value['Type'];
                    $MDPPersonalInitiative->Date  = $value['Date'];
                    $MDPPersonalInitiative->save();
                }
                foreach ($training as $item){
                    $MDPTraining = new MDPTraining();
                    $MDPTraining->MDPID = $ManagementDevelopmentPlane->ID;
                    $MDPTraining->TrainingTitle = $item['TrainingTitle'];
                    $MDPTraining->TrainingType = $item['TrainingType'];
                    $MDPTraining->TrainingDate = $item['TrainingDate'];
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

    public function edit($id){
        $mdp = ManagementDevelopmentPlane::where('ID',$id)->with('initiative','training')->first();

        $training_list = MDPEmployeeTrainingList::where('StaffID', $mdp->StaffID)->where('isDropDown','Y')->first();

        if (!empty($training_list)){
            $dropDown = 'YES';
        }else{
            $dropDown = 'NO';
        }

        $training_list_by_empcode = MDPEmployeeTrainingList::where('StaffID', $mdp->StaffID)->get();

        $dateFrom =  Carbon::now()->year -5;
        $dateTo =  Carbon::now()->year;
        $training_history = DB::select("EXEC SP_TrainingUserReport '$mdp->StaffID','$dateFrom','$dateTo' ");

        return response()->json([
            'training_list'=>$training_list_by_empcode,
            'training_history'=>$training_history,
            'dropDown'=>$dropDown,
            'data'=>new ManagementDevelopmentPlaneResource($mdp)
        ]);
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

    public function mdpExport(Request $request){
        $session = $request->sessionP;
        $Department = json_decode($request->Department);
        $mdp_list = ManagementDevelopmentPlane::query()->with('initiative','training','training.feedback');
        if (!empty($Department) && isset($Department)){
            $Department = collect($Department);
            $DeptName = $Department->pluck('DeptName');
            $mdp_list = $mdp_list->whereIn('Department',$DeptName);

        }
        $EmployeeList= json_decode($request->EmployeeList);
        if (!empty($EmployeeList) && isset($EmployeeList)){
            $EmployeeList = collect($EmployeeList);
            $EmployeeIDs = $EmployeeList->pluck('StaffID');
            $mdp_list = $mdp_list->whereIn('StaffID',$EmployeeIDs);
        }
        $mdp_list = $mdp_list->where('AppraisalPeriod',$session)
            ->orderBy('Department','asc')->get();

        return new ExportManagementDevelopmentPlaneCollection($mdp_list);
    }
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

        $appraisalPeriod = $request->sessionP;
        $EmployeeList= json_decode($request->EmployeeList);
        $val = ManagementDevelopmentPlane::select('ID');
        if (!empty($EmployeeList) && isset($EmployeeList)){
            $EmployeeList = collect($EmployeeList);
            $EmployeeIDs = $EmployeeList->pluck('StaffID');
            $val = $val->whereIn('StaffID',$EmployeeIDs);
        }
        if (!empty($appraisalPeriod)){
            $val = $val->where('AppraisalPeriod','=',$appraisalPeriod);

        }
        $val =  $val->get();
        $mdps =[];
        foreach ($val as $value){
            array_push($mdps,$value->ID);
        }
        $mdpIDS= implode(",", $mdps);

        $sql = "SP_doLoadMDPDetailsWTraining '$mdpIDS'";
        $mdps = DB::select($sql);
        return response()->json([
           'data'=>$mdps
        ]);
//        $conn = DB::connection('sqlsrv');
//        $pdo = $conn->getPdo()->prepare($sql);
//        $pdo->execute();
//
//        $res = array();
//
//        do {
//            $rows = $pdo->fetchAll(\PDO::FETCH_ASSOC);
//            $res[] = $rows;
//
//        } while ($pdo->nextRowset());
//
//        if (!empty($res[0])){
//            return response()->json([
//                'data' =>[
//                    'MDP Details'=>$res[0],
//                    'Personal Training'=>$res[1],
//                    'Required Training'=>$res[2],
//                    'Future Training'=>$res[3]
//                ] ,
//            ]);
//        }else{
//            return response()->json([
//                'status' => '0',
//                'message' => 'No Data Found',
//            ]);
//        }


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
        $EmpCode = $request->EmpCode;
        $TrainingTitle = collect($request->TrainingTitle);
        $TrainingTitleString = "";
        foreach($TrainingTitle as $row){
            $TrainingTitleString = $TrainingTitleString . $row['TrainingTitle'] . '##';
        }
        $TrainingTitleString = substr($TrainingTitleString,0,strlen($TrainingTitleString) - 2);
        $individual_training = DB::select("EXEC doLoadEmployeeWiseReport '$session','$EmpCode','$TrainingTitleString' ");
        return response()->json([
           'individual_training' => $individual_training
        ]);
    }

    public function getEmployeeIndividualTraining(Request $request){
        $session = $request->sessionP;
        $EmpCode = $request->EmpCode;
        $individual_training = DB::select("EXEC EmployeeIndividualTraining '$session','$EmpCode' ");
        return response()->json([
           'individual_training' => $individual_training
        ]);
    }

    public function getAllMDPDepartment(){
        $departments = DB::select('select distinct Department as DeptName from ManagementDevelopmentPlane');
        return response()->json([
            'departments'=>$departments
        ]);
    }
    public function getAllMDPEmployee(Request $request){
        $staffId = $request->staffId;
        $session = $request->sessionP;
        $Department = json_decode($request->Department);
        $emp_List = ManagementDevelopmentPlane::select('StaffID',DB::raw("CONCAT(StaffID, '- ', EmployeeName) AS Employee"));
            if (!empty($session)){
                $emp_List ->where(function ($q) use ($session) {
                    $q->where('AppraisalPeriod', 'like', '%' . $session . '%');
                });
            }
            if (!empty($Department) && isset($Department)){
                $Department = collect($Department);
                $DeptName = $Department->pluck('DeptName');
                $emp_List = $emp_List->whereIn('Department',$DeptName);
            }
            return response()->json([
            'employees'=>$emp_List->orderby('ID','DESC')->get()
        ]);
    }

    public function getAllTrainingTitle(){
        $departments = DB::select('
            SELECT 
                DISTINCT TrainingTitle 
            From MDPTraining 
            WHERE TrainingTitle IS NOT NULL
            ORDER BY 1
        ');
        return response()->json([
            'trainingtitle'=>$departments
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
            $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education','emphist')->first();
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

//            $training_history = MDPTraining::query()->whereIn('MDPID',$mdp)
//                ->select('MDPTraining.TrainingTitle','MDPTraining.TrainingType',DB::raw(" '' as CompetencyType"),'MDPTrainingFeedback.DoneDate')
//                ->leftJoin('MDPTrainingFeedback','MDPTrainingFeedback.TrainingID','=','MDPTraining.ID')
//                ->whereBetween(DB::raw("LEFT(MDPTrainingFeedback.DoneDate,4)"),[date('Y', strtotime('-4 year')),date('Y')])
//                ->where('MDPTrainingFeedback.Status','=', 'done')
//                ->orderBy('MDPTrainingFeedback.DoneDate','desc')
//                ->get();

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
            $MDPAppraisalPeriod = ManagementDevelopmentPlane::select(DB::raw("Right(AppraisalPeriod,4) as AppraisalPeriod "))->where('StaffID', $empcode)->orderby('ID','DESC')->first();
            if (!empty($MDPAppraisalPeriod)){
                $nextYear=($MDPAppraisalPeriod->AppraisalPeriod)+1;
                $period = ($MDPAppraisalPeriod->AppraisalPeriod).'-'.$nextYear;
            }else{
                $nextYear=date('Y', strtotime('+1 year'));
                $period=date('Y').'-'.$nextYear;
            }

            $training_history= DB::select("exec SP_doLoadMDPFiveYearsTraining '$empcode'");
            return response()->json([
                'employee'=>new EmployeeResource($employee),
                'training_history'=>$training_history,
                'training_list'=>$dup,
                'dropDown'=>$dropDown,
                'period'=>$period
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'msg'=>'EmpCode Not Found'
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
        $first_character = mb_substr($request->SuperVisorEmpCode, 0, 1);
        if ($first_character !== 'C'){
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
            $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education')->first();
            return response()->json([
                'employee'=>new SupervisorResource($employee),
            ]);
        }else{

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

            $employee = ContactPersonal::where('EmpCode', $empcode)->with('department','designation')->first();
            return response()->json([
                'employee'=>new ContSupervisorResource($employee),
            ]);
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
            $message = 'Successfully Disapproved';
            $title = 'Disapproved';
        }else{
            $status = 'Approved';
            $message = 'Successfully Approved';
            $title = 'Approved';
        }
        $mdp->MDPStatus = $status;
        $mdp->save();
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'title' => $title,
        ]);
    }
}

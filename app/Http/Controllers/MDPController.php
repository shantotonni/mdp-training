<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagementDevelopmentPlaneRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ManagementDevelopmentPlaneCollection;
use App\Http\Resources\ManagementDevelopmentPlaneResource;
use App\Http\Resources\SupervisorResource;
use App\Models\Employee;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPEmployeeTrainingList;
use App\Models\MDPPersonalInitiative;
use App\Models\MDPTraining;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
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
            if ($session){
                $mdp = $mdp->where('AppraisalPeriod',$session);
            }
            $mdp = $mdp->orderBy('ID','desc')->paginate(15);
        }else{
            $mdp = ManagementDevelopmentPlane::orderBy('ID','desc')->where('StaffID',$empcode)->paginate(15);
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
            //$area = $request->area;

            $ManagementDevelopmentPlane = new ManagementDevelopmentPlane();
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
            $ManagementDevelopmentPlane->CreatedBy = $empcode;
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
//                foreach ($area as $are){
//                    $areaone = new Area();
//                    $areaone->MDPID = $ManagementDevelopmentPlane->ID;
//                    $areaone->AreaOneName = $are['AreaOneName'];
//                    $areaone->AreaTwoName = $are['AreaTwoName'];
//                    $areaone->save();
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

    public function update(ManagementDevelopmentPlaneRequest $request){

        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];

            $initiative = $request->initiative;
            $training = $request->training;
            //$area = $request->area;

            $ManagementDevelopmentPlane = ManagementDevelopmentPlane::where('ID',$request->ID)->first();
            MDPPersonalInitiative::where('MDPID',$request->ID)->delete();
            MDPTraining::where('MDPID',$request->ID)->delete();
            //Area::where('MDPID',$request->ID)->delete();

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
//                foreach ($area as $are){
//                    $areaone = new Area();
//                    $areaone->MDPID = $ManagementDevelopmentPlane->ID;
//                    $areaone->AreaOneName = $are['AreaOneName'];
//                    $areaone->AreaTwoName = $are['AreaTwoName'];
//                    $areaone->save();
//                }

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

        $Department = json_decode($request->Department);
        $mdp_list = ManagementDevelopmentPlane::query()->with('initiative','training','training.feedback');
        if (!empty($Department) && isset($Department)){
            $Department = collect($Department);
            $DeptName = $Department->pluck('DeptName');
            $mdp_list = $mdp_list->whereIn('Department',$DeptName);
        }
        $mdp_list = $mdp_list->orderBy('Department','asc')->get();
        return new ManagementDevelopmentPlaneCollection($mdp_list);
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

    public function search($query)
    {
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
        //return $TrainingTitleString;
        // if(!empty(json_decode($request->TrainingTitle)->TrainingTitle)){
        //     $TrainingTitle = json_decode($request->TrainingTitle)->TrainingTitle;
        // }else{
        //     $TrainingTitle = "";
        // }
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
            $training_history = DB::select("EXEC SP_TrainingUserReport '$empcode','$dateFrom','$dateTo' ");

            $training_list = MDPEmployeeTrainingList::where('StaffID', $empcode)->where('isDropDown','Y')->first();

            if (!empty($training_list)){
                $dropDown = 'YES';
            }else{
                $dropDown = 'NO';
            }

            $training_list_by_empcode = MDPEmployeeTrainingList::where('StaffID', $empcode)->get();

            return response()->json([
                'employee'=>new EmployeeResource($employee),
                'training_history'=>$training_history,
                'training_list'=>$training_list_by_empcode,
                'dropDown'=>$dropDown,
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'msg'=>'EmpCode Not Found'
            ]);
        }
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

        $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education')->first();
        return response()->json([
            'employee'=>new SupervisorResource($employee),
        ]);
    }

    public function getLevelWiseSuggestiveList($empcode){
        //$employee_level = EmployeeDepartment::where('EmpCode',$empcode)->first();
        $suggestive_list = DB::select("EXEC usp_doLoadBDPTrainingTitel '$empcode' ");
       // $suggestive_list = LevelWiseLearningOfferingList::where('Level',$employee_level->Level)->get();
        return response()->json([
            'suggestive_list'=>$suggestive_list,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagementDevelopmentPlaneRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ManagementDevelopmentPlaneCollection;
use App\Http\Resources\ManagementDevelopmentPlaneResource;
use App\Http\Resources\SupervisorResource;
use App\Models\Area;
use App\Models\AreaTwo;
use App\Models\Employee;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPPersonalInitiative;
use App\Models\MDPTraining;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class MDPController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        if ($role == 'admin'){
            $mdp = ManagementDevelopmentPlane::orderBy('ID','desc')->paginate(15);
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
            $area = $request->area;

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
                foreach ($area as $are){
                    $areaone = new Area();
                    $areaone->MDPID = $ManagementDevelopmentPlane->ID;
                    $areaone->AreaOneName = $are['AreaOneName'];
                    $areaone->AreaTwoName = $are['AreaTwoName'];
                    $areaone->save();
                }
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
            $area = $request->area;

            $ManagementDevelopmentPlane = ManagementDevelopmentPlane::where('ID',$request->ID)->first();
            MDPPersonalInitiative::where('MDPID',$request->ID)->delete();
            MDPTraining::where('MDPID',$request->ID)->delete();
            Area::where('MDPID',$request->ID)->delete();

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
//            $ManagementDevelopmentPlane->Area = $request->Area;
//            $ManagementDevelopmentPlane->AreaTwo = $request->AreaTwo;
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
                foreach ($area as $are){
                    $areaone = new Area();
                    $areaone->MDPID = $ManagementDevelopmentPlane->ID;
                    $areaone->AreaOneName = $are['AreaOneName'];
                    $areaone->AreaTwoName = $are['AreaTwoName'];
                    $areaone->save();
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
        $mdp = ManagementDevelopmentPlane::where('ID',$id)->with('initiative','training','area')->first();
        return new ManagementDevelopmentPlaneResource($mdp);
    }

    public function print($id){
        $mdp = ManagementDevelopmentPlane::where('ID',$id)->with('initiative','training','area')->first();
        return new ManagementDevelopmentPlaneResource($mdp);
    }

    public function search($query)
    {
        return new ManagementDevelopmentPlaneCollection(ManagementDevelopmentPlane::where('StaffID','LIKE',"%$query%")->latest()->paginate(10));
    }

    public function getEmployeeByEmployeeCode(Request $request){
        $empcode = $request->EmpCode;
        if ($empcode){
            $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education','emphist')->first();
            $dateFrom =  Carbon::now()->year -5;
            $dateTo =  Carbon::now()->year;
            $training_history = DB::select("EXEC SP_TrainingUserReport '$empcode','$dateFrom','$dateTo' ");
            return response()->json([
                'employee'=>new EmployeeResource($employee),
                'training_history'=>$training_history
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
        $employee = Employee::where('EmpCode', $request->SuperVisorEmpCode)->with('department','designation','email','personal','education')->first();
        return response()->json([
            'employee'=>new SupervisorResource($employee),
        ]);
    }
}

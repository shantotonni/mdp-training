<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionPlanRequest;
use App\Http\Resources\ActionPlanCollection;
use App\Http\Resources\ActionPlanResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ExportActionPlanCollection;
use App\Http\Resources\SupervisorResource;
use App\Models\ActionPlan;
use App\Models\ActionPlanTask;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class ActionPlanController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        $Business = $payload['Business'];

        $Division = $request->Division;
        $Department = $request->Department;

        $action_plan = ActionPlan::query()->orderBy('ID','desc');
        if (!empty($Division)){
            $action_plan = $action_plan->where('Division', $Division);
        }
        if (!empty($Department)){
            $action_plan = $action_plan->where('Department',$Department);
        }

        if ($role == 'Administrator'){
            $action_plan= $action_plan;
        }elseif ($role == 'sadmin'){
            $action_plan= $action_plan->where('Division',$Business);
        } else{
            $action_plan = $action_plan->where('StaffID',$empcode);
        }
        $action_plan = $action_plan->paginate(15);
        return new ActionPlanCollection($action_plan);
    }

    public function store(ActionPlanRequest $request){

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

            $exist_check = ActionPlan::where('ActionPlanPeriod',$request->ActionPlanPeriod)->where('StaffID',$request->StaffID)->exists();
            if ($exist_check){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Already Exists.'
                ]);
            }

            $finds = $request->finds;

            $ActionPlane                            = new ActionPlan();
            $ActionPlane->ActionPlanPeriod          = $request->ActionPlanPeriod;
            $ActionPlane->StaffID                   = $request->StaffID;
            $ActionPlane->EmployeeName              = $request->EmployeeName;
            $ActionPlane->Designation               = $request->Designation;
            $ActionPlane->Department                = $request->Department;
            $ActionPlane->Division                  = $request->Division;
            $ActionPlane->OfficialEmail             = $request->OfficialEmail;
            $ActionPlane->Mobile                    = $request->Mobile;

            $ActionPlane->SuppervisorStaffID        = $request->SuppervisorStaffID;
            $ActionPlane->SuppervisorName           = $request->SuppervisorName;
            $ActionPlane->SuppervisorDesignation    = $request->SuppervisorDesignation;
            $ActionPlane->SuppervisorEmail          = $request->SuppervisorEmail;
            $ActionPlane->SuppervisorMobile         = $request->SuppervisorMobile;
            $ActionPlane->CreatedBy                 = $empcode;
            $ActionPlane->UpdatedBy                 = $empcode;
            if ($ActionPlane->save()){
                foreach ($finds as $value){
                    $details                         = new ActionPlanTask();
                    $details->EmployeeActionPlanID   = $ActionPlane->ID;
                    $details->TaskName               = $value['TaskName'];
                    $details->TargetDateOfCompletion = isset($value['TargetDateOfCompletion']) ? $value['TargetDateOfCompletion'] : '';
                    $details->CriterionOfMeasurement = isset($value['CriterionOfMeasurement']) ? $value['CriterionOfMeasurement'] : '';
                    $details->save();
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

    public function edit($id){
        $action_plan = ActionPlan::where('ID',$id)->with('task')->first();

        return response()->json([
            'action_plan'=>new ActionPlanResource($action_plan)
        ]);
    }

    public function update(ActionPlanRequest $request){

        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];

            $finds = $request->finds;

            $ActionPlane                            = ActionPlan::where('ID',$request->ID)->first();
            $ActionPlane->ActionPlanPeriod          = $request->ActionPlanPeriod;
            $ActionPlane->StaffID                   = $request->StaffID;
            $ActionPlane->EmployeeName              = $request->EmployeeName;
            $ActionPlane->Designation               = $request->Designation;
            $ActionPlane->Department                = $request->Department;
            $ActionPlane->Division                  = $request->Division;
            $ActionPlane->OfficialEmail             = $request->OfficialEmail;
            $ActionPlane->Mobile                    = $request->Mobile;

            $ActionPlane->SuppervisorStaffID        = $request->SuppervisorStaffID;
            $ActionPlane->SuppervisorName           = $request->SuppervisorName;
            $ActionPlane->SuppervisorDesignation    = $request->SuppervisorDesignation;
            $ActionPlane->SuppervisorEmail          = $request->SuppervisorEmail;
            $ActionPlane->SuppervisorMobile         = $request->SuppervisorMobile;
            $ActionPlane->UpdatedBy                 = $empcode;

            if ($ActionPlane->save()){
                ActionPlanTask::where('EmployeeActionPlanID',$request->ID)->delete();
                foreach ($finds as $value){
                    $details                         = new ActionPlanTask();
                    $details->EmployeeActionPlanID   = $ActionPlane->ID;
                    $details->TaskName               = $value['TaskName'];
                    $details->TargetDateOfCompletion = isset($value['TargetDateOfCompletion']) ? $value['TargetDateOfCompletion'] : '';
                    $details->CriterionOfMeasurement = isset($value['CriterionOfMeasurement']) ? $value['CriterionOfMeasurement'] : '';
                    $details->save();
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
        $action_plan = ActionPlan::where('ID',$id)->with('task')->first();
        return new ActionPlanResource($action_plan);
    }

    public function mdpExport(){
        $mdp_list = ActionPlan::orderBy('ID','desc')->with('initiative','training')->get();
        return new ActionPlanCollection($mdp_list);
    }

    public function search($query)
    {
        $ActionPlan = ActionPlan::where('StaffID','LIKE',"%$query%")->latest()
        ->orWhere('EmployeeName','LIKE',"%$query%")
        ->orWhere('Mobile','LIKE',"%$query%")
        ->orWhere('Department','LIKE',"%$query%")
        ->orWhere('Division','LIKE',"%$query%")->paginate(10);
        return new ActionPlanCollection($ActionPlan);
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
            $employee = Employee::where('EmpCode', $empcode)->with('department','designation','email','personal','education','emphist','division')->first();
            return response()->json([
                'employee'=>new EmployeeResource($employee),
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

    public function getAllDivision(){
        $divisions = Department::select('DivCode','Division')
            ->where('DivCode','!=','')
            ->where('Division','!=','')
            ->get()->unique('Division');
        return response()->json([
            'divisions' => $divisions
        ]);
    }

    public function getAllDepartment(Request $request){
        $Division = $request->Division;
        $departments = Department::select('DeptName','DeptCode','Division','DivCode')
            ->where('DeptCode','!=','')
            ->where('DeptName','!=','')
            ->where('Division','=',$Division)
            ->get()->unique('DeptName');
        return response()->json([
            'departments' => $departments
        ]);
    }

     public function exportActionPlan(Request $request)
     {
         $query = $request->param;
         return new ExportActionPlanCollection(ActionPlan::where('StaffID','LIKE',"%$query%")
             ->orWhere('EmployeeName','LIKE',"%$query%")
             ->orWhere('OfficialEmail','LIKE',"%$query%")
             ->orWhere('Mobile','LIKE',"%$query%")
             ->orWhere('Department','LIKE',"%$query%")
             ->orWhere('Division','LIKE',"%$query%")
             ->latest()->get());
     }
}

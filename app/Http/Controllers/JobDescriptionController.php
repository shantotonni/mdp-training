<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobDescriptionRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\JobDescriptionCollection;
use App\Http\Resources\JobDescriptionResource;
use App\Http\Resources\SupervisorResource;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobResponsibilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class JobDescriptionController extends Controller
{
    public function index(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        $Business = $payload['Business'];

        $Division = $request->Division;
        $Department = $request->Department;

        $job_description = JobDescription::query()->orderBy('ID','desc');
        if (!empty($Division)){
            $job_description = $job_description->where('Division', $Division);
        }
        if (!empty($Department)){
            $job_description = $job_description->where('Department',$Department);
        }

        if ($role == 'Administrator'){
            $job_description= $job_description;
        }elseif ($role == 'jadmin'){
            $job_description= $job_description;
            //$job_description= $job_description->where('Division',$Business);
        } else{
            $job_description = $job_description->where('StaffID',$empcode);
        }
        $job_description = $job_description->paginate(15);
        return new JobDescriptionCollection($job_description);
    }

    public function store(JobDescriptionRequest $request){
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

            $exist_check = JobDescription::where('JobDescriptionPeriod',$request->JobDescriptionPeriod)
                ->where('StaffID',$request->StaffID)->exists();
            if ($exist_check){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Already Exists.'
                ]);
            }

            $finds = $request->finds;

            $JobDescription                            = new JobDescription();
            $JobDescription->JobDescriptionPeriod          = $request->JobDescriptionPeriod;
            $JobDescription->StaffID                   = $request->StaffID;
            $JobDescription->EmployeeName              = $request->EmployeeName;
            $JobDescription->Designation               = $request->Designation;
            $JobDescription->Department                = $request->Department;
            $JobDescription->Division                  = $request->Division;
            $JobDescription->Business                  = $request->Business;
            $JobDescription->OfficialEmail             = $request->OfficialEmail;
            $JobDescription->Mobile                    = $request->Mobile;

            $JobDescription->SuppervisorStaffID        = $request->SuppervisorStaffID;
            $JobDescription->SuppervisorName           = $request->SuppervisorName;
            $JobDescription->SuppervisorDesignation    = $request->SuppervisorDesignation;
            $JobDescription->SuppervisorEmail          = $request->SuppervisorEmail;
            $JobDescription->SuppervisorMobile         = $request->SuppervisorMobile;

            $JobDescription->JobTitle                   = $request->JobTitle;
            $JobDescription->PurposeOfJob               = $request->PurposeOfJob;
            $JobDescription->JobCustomerInternal        = $request->JobCustomerInternal;
            $JobDescription->JobCustomerExternal        = $request->JobCustomerExternal;

            $JobDescription->CreatedBy                 = $empcode;
            $JobDescription->UpdatedBy                 = $empcode;
            if ($JobDescription->save()){
                foreach ($finds as $value){
                    $details                         = new JobResponsibilities();
                    $details->JDID                   = $JobDescription->ID;
                    $details->JobResponsibilities    = $value['JobResponsibilities'];
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
        $job_description = JobDescription::where('ID',$id)->with('details')->first();
        return response()->json([
            'job_description'=>new JobDescriptionResource($job_description)
        ]);
    }

    public function update(JobDescriptionRequest $request){

        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $empcode = $payload['EmpCode'];

            $finds = $request->finds;

            $JobDescription                            = JobDescription::where('ID',$request->ID)->first();
            $JobDescription->StaffID                   = $request->StaffID;
            $JobDescription->EmployeeName              = $request->EmployeeName;
            $JobDescription->Designation               = $request->Designation;
            $JobDescription->Department                = $request->Department;
            $JobDescription->Division                  = $request->Division;
            $JobDescription->Business                  = $request->Business;
            $JobDescription->OfficialEmail             = $request->OfficialEmail;
            $JobDescription->Mobile                    = $request->Mobile;

            $JobDescription->SuppervisorStaffID        = $request->SuppervisorStaffID;
            $JobDescription->SuppervisorName           = $request->SuppervisorName;
            $JobDescription->SuppervisorDesignation    = $request->SuppervisorDesignation;
            $JobDescription->SuppervisorEmail          = $request->SuppervisorEmail;
            $JobDescription->SuppervisorMobile         = $request->SuppervisorMobile;

            $JobDescription->JobTitle                   = $request->JobTitle;
            $JobDescription->PurposeOfJob               = $request->PurposeOfJob;
            $JobDescription->JobCustomerInternal        = $request->JobCustomerInternal;
            $JobDescription->JobCustomerExternal        = $request->JobCustomerExternal;

            $JobDescription->UpdatedBy                 = $empcode;

            if ($JobDescription->save()){
                JobResponsibilities::where('JDID',$request->ID)->delete();
                foreach ($finds as $value){
                    $details                         = new JobResponsibilities();
                    $details->JDID                   = $JobDescription->ID;
                    $details->JobResponsibilities    = $value['JobResponsibilities'];
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

    public function print($id){
        $job_description = JobDescription::where('ID',$id)->with('details')->first();
        return new JobDescriptionResource($job_description);
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
}

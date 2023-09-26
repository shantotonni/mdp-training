<?php

namespace App\Http\Resources;

use App\Models\JobDescription;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class JobDescriptionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];

        return [
            'data'=>$this->collection->transform(function ($job_description)use($empcode){

                if ($job_description->SuppervisorStaffID == $empcode){
                    $superVisor  = 'Y';
                }else{
                    $superVisor  = 'N';
                }
                return [
                    'ID'=>$job_description->ID,
                    'StaffID'=>$job_description->StaffID,
                    'EmployeeName'=>$job_description->EmployeeName,
                    'Mobile'=>$job_description->Mobile,
                    'Designation'=>$job_description->Designation,
                    'Department'=>$job_description->Department,
                    'OfficialEmail'=>$job_description->OfficialEmail,
                    'SuppervisorStaffID'=>$job_description->SuppervisorStaffID,
                    'SupervisorName'=>$job_description->SuppervisorName,
                    'SupervisorEmail'=>$job_description->SuppervisorEmail,
                    'SupervisorMobile'=>$job_description->SuppervisorMobile,
                    'SuppervisorDesignation'=>$job_description->SuppervisorDesignation,
                    'Division'=>$job_description->Division,
                    'Business'=>$job_description->Business,
                    'JobDescriptionPeriod'=>$job_description->JobDescriptionPeriod,
                    'JobTitle'=>$job_description->JobTitle,
                    'Portfolio'=>$job_description->Portfolio,
                    'PurposeOfJob'=>$job_description->PurposeOfJob,
                    'JobCustomerExternal'=>$job_description->JobCustomerExternal,
                    'JobCustomerInternal'=>$job_description->JobCustomerInternal,
                    'DateOfPreparation'=>date('Y-m-d',strtotime($job_description->UpdatedBy)),
                    'JobStatus'=>$job_description->JobStatus,
                    'Supervisor'=>$superVisor,
                ];
            })
        ];
    }
}

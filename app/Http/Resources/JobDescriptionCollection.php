<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class JobDescriptionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->transform(function ($job_description){
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
                ];
            })
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobDescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID'=>$this->ID,
            'StaffID'=>$this->StaffID,
            'EmployeeName'=>$this->EmployeeName,
            'Mobile'=>$this->Mobile,
            'Designation'=>$this->Designation,
            'Department'=>$this->Department,
            'OfficialEmail'=>$this->OfficialEmail,
            'SuppervisorStaffID'=>$this->SuppervisorStaffID,
            'SuppervisorName'=>$this->SuppervisorName,
            'SuppervisorEmail'=>$this->SuppervisorEmail,
            'SuppervisorMobile'=>$this->SuppervisorMobile,
            'SuppervisorDesignation'=>$this->SuppervisorDesignation,
            'CurrentPosition'=>$this->Designation,
            'Division'=>$this->Division,
            'Business'=>$this->Business,
            'ActionPlanPeriod'=>$this->ActionPlanPeriod,
            'JobDescriptionPeriod'=>$this->JobDescriptionPeriod,
            'JobTitle'=>$this->JobTitle,
            'Portfolio'=>$this->Portfolio,
            'PurposeOfJob'=>$this->PurposeOfJob,
            'JobCustomerExternal'=>$this->JobCustomerExternal,
            'JobCustomerInternal'=>$this->JobCustomerInternal,
            'DateOfPreparation'=>date('Y-m-d',strtotime($this->CreatedDate)),
            'JobStatus'=>$this->JobStatus,
            'finds'=>$this->details,
        ];
    }
}

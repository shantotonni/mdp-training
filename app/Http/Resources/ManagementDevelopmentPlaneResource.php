<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManagementDevelopmentPlaneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $session = explode('-',$this->AppraisalPeriod);
        $from_period = $session[0];
        $to_period = $session[1];
        return [
            'ID'=>$this->ID,
            'StaffID'=>$this->StaffID,
            'AppraisalPeriod'=>$this->AppraisalPeriod,
            'from_period'=>$from_period,
            'to_period'=>$to_period,
            'AreaOne'=>$this->AreaOne,
            'AreaTwo'=>$this->AreaTwo,
            'CreatedDate'=>$this->CreatedDate,
            'CurrentPosition'=>$this->CurrentPosition,
            'Department'=>$this->Department,
            'Designation'=>$this->Designation,
            'EmployeeName'=>$this->EmployeeName,
            'JoiningDate'=>date('Y-m-d',strtotime($this->JoiningDate)),
            'Mobile'=>$this->Mobile,
            'DateOfBirth'=>date('Y-m-d',strtotime($this->DateOfBirth)),
            'OfficialEmail'=>$this->OfficialEmail,
            'PresentJobStartedOn'=>date('Y-m-d',strtotime($this->PresentJobStartedOn)),
            'Qualification'=>$this->Qualification,
            'SuppervisorDesignation'=>$this->SuppervisorDesignation,
            'SuppervisorEmail'=>$this->SuppervisorEmail,
            'SuppervisorMobile'=>$this->SuppervisorMobile,
            'SuppervisorName'=>$this->SuppervisorName,
            'SuppervisorStaffID'=>$this->SuppervisorStaffID,
            'initiative'=>$this->initiative,
            'training'=>$this->training,
        ];
    }
}

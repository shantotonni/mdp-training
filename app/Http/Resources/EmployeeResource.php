<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'StaffID'=>$this->EmpCode,
            'EmployeeName'=>isset($this->personal) ? $this->personal->Name: '',
            'DeptCode'=>$this->DeptCode,
            'Department'=>isset($this->department) ? $this->department->DeptName: '',
            'DesgCode'=>$this->DesgCode,
            'Designation'=>isset($this->designation) ? $this->designation->DesgName: '',
            'OfficialEmail'=>isset($this->email) ? $this->email->EmailID: '',
            'Mobile'=>isset($this->personal) ? $this->personal->MobileNo: '',
            'DateOfBirth'=>isset($this->personal) ? date('Y-m-d',strtotime($this->personal->BirthDate)): '',
            'CurrentPosition'=>isset($this->designation) ? $this->designation->DesgName: '',
            //'PresentJobStartedOn'=>isset($this->emphist) ? date('Y-m-d',strtotime($this->emphist->EffectiveDate)): '',
            'PresentJobStartedOn'=>isset($this->LastPromoDate) ? date('Y-m-d',strtotime($this->LastPromoDate)): '',
            'Qualification'=> isset($this->education) ? $this->education->Degree: '',
            'JoiningDate'=>date('Y-m-d',strtotime($this->JoiningDate)),
        ];
    }
}

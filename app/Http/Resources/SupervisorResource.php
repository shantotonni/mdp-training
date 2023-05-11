<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupervisorResource extends JsonResource
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
            'SuppervisorStaffID'=>$this->EmpCode,
            'SuppervisorName'=>isset($this->personal) ? $this->personal->Name: '',
            'SuppervisorDeptCode'=>$this->DeptCode,
            'SuppervisorDepartment'=>isset($this->department) ? $this->department->DeptName: '',
            'SuppervisorDesgCode'=>$this->DesgCode,
            'SuppervisorDesignation'=>isset($this->designation) ? $this->designation->DesgName: '',
            'SuppervisorEmail'=>isset($this->email) ? $this->email->EmailID: '',
            'SuppervisorMobile'=>isset($this->personal) ? $this->personal->MobileNo: '',
            'JoiningDate'=>$this->JoiningDate,
        ];
    }
}

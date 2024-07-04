<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupervisorResource extends JsonResource
{
    public function toArray($request)
    {
        if (isset($this->personal)){
            $len = strlen($this->personal->MobileNo);
            if ($len  < 11){
                $mobile = '0'.$this->personal->MobileNo;
            }else{
                if ($len == 14){
                    $mobile = substr($this->personal->MobileNo, 3);
                }elseif ($len == 13){
                    $mobile = substr($this->personal->MobileNo, 2);
                } else
                    $mobile = $this->personal->MobileNo;
            }
        }else{
            $mobile = '';
        }
        return [
            'SuppervisorStaffID'=>$this->EmpCode,
            'SuppervisorName'=>isset($this->personal) ? $this->personal->Name: '',
            'SuppervisorDeptCode'=>$this->DeptCode,
            'SuppervisorDepartment'=>isset($this->department) ? $this->department->DeptName: '',
            'SuppervisorDesgCode'=>$this->DesgCode,
            'SuppervisorDesignation'=>isset($this->designation) ? $this->designation->DesgName: '',
            'SuppervisorEmail'=>isset($this->email) ? $this->email->EmailID: '',
            'SuppervisorMobile'=>$mobile,
            'JoiningDate'=>$this->JoiningDate,
        ];
    }
}

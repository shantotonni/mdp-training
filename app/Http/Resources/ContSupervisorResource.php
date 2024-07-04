<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContSupervisorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (isset($this->MobileNo)){
            $len = strlen($this->MobileNo);
            if ($len  < 11){
                $mobile = '0'.$this->MobileNo;
            }else{
                if ($len == 14){
                    $mobile = substr($this->MobileNo, 3);
                }elseif ($len == 13){
                    $mobile = substr($this->MobileNo, 2);
                } else
                    $mobile = $this->MobileNo;
            }
        }else{
            $mobile = '';
        }
        return [
            'SuppervisorStaffID'=>$this->EmpCode,
            'SuppervisorName'=>$this->Name,
            'SuppervisorDeptCode'=>$this->DeptCode,
            'SuppervisorDepartment'=>isset($this->department) ? $this->department->DeptName: '',
            'SuppervisorDesgCode'=>$this->DesgCode,
            'SuppervisorDesignation'=>isset($this->designation) ? $this->designation->DesgName: '',
            'SuppervisorEmail'=> '',
            'SuppervisorMobile' => $mobile,
            'JoiningDate'=>$this->JoiningDate,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'StaffID'               => $this->EmpCode,
            'EmployeeName'          => isset($this->personal) ? $this->personal->Name: '',
            'DivCode'               => $this->DivCode,
            'Division'              => isset($this->division) ? $this->division->DivName: '',
            'DeptCode'              => $this->DeptCode,
            'Department'            => isset($this->department) ? $this->department->DeptName: '',
            'Business'              => isset($this->department) ? $this->department->DeptUnit: '',
            'DesgCode'              => $this->DesgCode,
            'Designation'           => isset($this->designation) ? $this->designation->DesgName: '',
            'OfficialEmail'         => isset($this->email) ? $this->email->EmailID: '',
            'Mobile'                => $mobile,
            'DateOfBirth'           => isset($this->personal) ? date('Y-m-d',strtotime($this->personal->BirthDate)): '',
            'CurrentPosition'       => isset($this->designation) ? $this->designation->DesgName: '',
            //'PresentJobStartedOn' => isset($this->emphist) ? date('Y-m-d',strtotime($this->emphist->EffectiveDate)): '',
            'PresentJobStartedOn'   => isset($this->LastPromoDate) ? date('Y-m-d',strtotime($this->LastPromoDate)): '',
            'Qualification'         => isset($this->education) ? $this->education->Degree: '',
            'JoiningDate'           => date('Y-m-d',strtotime($this->JoiningDate)),
        ];
    }
}

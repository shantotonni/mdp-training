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


//        $category = '';
//        if (isset($this->Grade)) {
//            $gradeNumber = intval(substr($this->Grade, -2)); // get last 2 digits
//            if ($gradeNumber >= 1 && $gradeNumber <= 4) {
//                $category = 'Junior';
//            } elseif ($gradeNumber >= 5 && $gradeNumber <= 7) {
//                $category = 'Mid';
//            } elseif ($gradeNumber >= 8 && $gradeNumber <= 11) {
//                $category = 'Top';
//            }
//        }

        return [
            'StaffID'               => $this->EmpCode?$this->EmpCode:'',
            'EmployeeName'          => isset($this->personal) ? $this->personal->Name: '',
            'DivCode'               => $this->DivCode?$this->DivCode:'',
            'Division'              => isset($this->division) ? $this->division->DivName: '',
            'DeptCode'              => $this->DeptCode?$this->DeptCode:'',
            'Department'            => isset($this->department) ? $this->department->DeptName: '',
            'Business'              => isset($this->department) ? $this->department->DeptUnit: '',
            'DesgCode'              => $this->DesgCode?$this->DesgCode:'',
            'Designation'           => isset($this->designation) ? $this->designation->DesgName: '',
            'OfficialEmail'         => isset($this->email) ? $this->email->EmailID: '',
            'Mobile'                => $mobile?$mobile:'',
            'DateOfBirth'           => isset($this->personal) ? date('d-m-Y',strtotime($this->personal->BirthDate)): '',
            'CurrentPosition'       => isset($this->designation) ? $this->designation->DesgName: '',
            //'PresentJobStartedOn' => isset($this->emphist) ? date('Y-m-d',strtotime($this->emphist->EffectiveDate)): '',
            'PresentJobStartedOn'   => isset($this->LastPromoDate) ? date('d-m-Y',strtotime($this->LastPromoDate)): date('d-m-Y',strtotime($this->JoiningDate)),
            'Qualification'         => isset($this->education) ? $this->education->Degree: '',
            'JoiningDate'           => $this->JoiningDate? date('d-m-Y',strtotime($this->JoiningDate)):'',
            'Grade'                 => $this->grade->Grade,
            'Level'                 => $this->grade->Labeling,
        ];
    }
}

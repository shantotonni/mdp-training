<?php

namespace App\Http\Resources\MDP;

use App\Models\MDPTraining;
use App\Models\NewMDPEmployeeTrainingList;
use App\Models\SalaryGrade;
use App\Models\TrainingName;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagementDevelopmentPlaneResource extends JsonResource
{
    public function toArray($request)
    {
        $session = explode('-',$this->AppraisalPeriod);
        $from_period = $session[0];
        $to_period = $session[1];
//        //area one
//        $area_one = strip_tags($this->AreaOne);
//        $area_one_chunk = chunk_split($area_one, 140,'*');
//        $expload_areay_one = explode('*',$area_one_chunk);
//        //area two
//        $area_two = strip_tags($this->AreaTwo);
//        $area_two_chunk = chunk_split($area_two, 140,'*');
//        $expload_areay_two = explode('*',$area_two_chunk);

        $age = Carbon::parse($this->DateOfBirth)->age;

       if ($this->AreaOne){
           $areaOneTitle = TrainingName::select('TrnName')->where('TrnCode','=', $this->AreaOne)->first();
           $areaTwoTitle = TrainingName::select('TrnName')->where('TrnCode', '=',$this->AreaTwo)->first();
       }else{
           $areaOneTitle=null;
           $areaTwoTitle=null;
       }
       $grade = $this->employee->Grade;
       $label = SalaryGrade::select('Labeling')->where('Grade','=',$grade)->first();
//        $category = '';
//        if (isset($this->employee->Grade)) {
//            $gradeNumber = intval(substr($this->employee->Grade, -2)); // get last 2 digits
//            if ($gradeNumber >= 1 && $gradeNumber <= 4) {
//                $category = 'Junior';
//            } elseif ($gradeNumber >= 5 && $gradeNumber <= 7) {
//                $category = 'Mid';
//            } elseif ($gradeNumber >= 8 && $gradeNumber <= 11) {
//                $category = 'Top';
//            }
//        }


        return [
            'ID'=> $this->ID,
            'StaffID'=> $this->StaffID,
            'AppraisalPeriod'=> $this->AppraisalPeriod?$this->AppraisalPeriod:'',
            'from_period'=> $from_period,
            'to_period'=>$to_period,
            'FutureTrainingOneDetails'=> $this->FutureTrainingOneDetails,
            'AreaOne'=> $this->AreaOne,
            'AreaOneTitle' => $areaOneTitle? $areaOneTitle->TrnName:$this->AreaOne,
            'FutureTrainingTwoDetails'=> $this->FutureTrainingTwoDetails,
            'AreaTwo'=> $this->AreaTwo,
            'AreaTwoTitle' => $areaTwoTitle? $areaTwoTitle->TrnName:$this->AreaTwo,

            'CreatedDate'=> date('F j, Y',strtotime($this->CreatedDate)),
            'CurrentPosition'=> $this->CurrentPosition?$this->CurrentPosition:'',
            'Department'=> $this->Department?$this->Department:'',
            'Designation'=> $this->Designation?$this->Designation:'',
            'Signature'=> $this->Signature?$this->Signature:'',
            'EmployeeName'=> $this->EmployeeName?$this->EmployeeName:'',
            'JoiningDate'=> $this->JoiningDate?date('d-m-Y',strtotime($this->JoiningDate)):'',
            'Mobile'=> $this->Mobile?$this->Mobile:'',
            'DateOfBirth'=> $this->DateOfBirth?date('d-m-Y',strtotime($this->DateOfBirth)):'',
            'OfficialEmail'=> $this->OfficialEmail,
            'PresentJobStartedOn'=> $this->PresentJobStartedOn ? date('d-m-Y',strtotime($this->PresentJobStartedOn)) : date('d-m-Y',strtotime($this->JoiningDate)),
            'Qualification'=> $this->Qualification?$this->Qualification:'',
            'SuppervisorDesignation'=> $this->SuppervisorDesignation?$this->SuppervisorDesignation:'',
            'SuppervisorEmail'=> $this->SuppervisorEmail?$this->SuppervisorEmail:'',
            'SuppervisorMobile'=> $this->SuppervisorMobile?$this->SuppervisorMobile:'',
            'SuppervisorName'=> $this->SuppervisorName?$this->SuppervisorName:'',
            'SuppervisorStaffID'=> $this->SuppervisorStaffID?$this->SuppervisorStaffID:'',
            'initiative'=> $this->initiative,
            'training'=>$this->training,
            'MDPStatus'=>$this->MDPStatus,
            'Business'=>$this->Business,
            'Signature'=>$this->Signature,
            'ApprovedDate'=>$this->ApprovedDate?date('F j, Y',strtotime($this->ApprovedDate)):'',
            'Grade'                 => $grade,
            'Level'              => $label->Labeling,
            //'area'=>$this->area,

            //'AreaOneText'=> $this->Area,
            //'AreaTwoText'=> $this->AreaTwo,
        ];
    }
}

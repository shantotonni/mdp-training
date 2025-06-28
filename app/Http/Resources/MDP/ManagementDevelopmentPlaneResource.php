<?php

namespace App\Http\Resources\MDP;

use App\Models\MDPTraining;
use App\Models\NewMDPEmployeeTrainingList;
use App\Models\TrainingName;
use Carbon\Carbon;
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
            //'area'=>$this->area,

            //'AreaOneText'=> $this->Area,
            //'AreaTwoText'=> $this->AreaTwo,
        ];
    }
}

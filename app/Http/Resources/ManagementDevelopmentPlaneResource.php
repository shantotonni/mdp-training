<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagementDevelopmentPlaneResource extends JsonResource
{
    public function toArray($request)
    {
        $session = explode('-',$this->AppraisalPeriod);
        $from_period = $session[0];
        $to_period = $session[1];
        //area one
        $area_one = strip_tags($this->AreaOne);
        $area_one_chunk = chunk_split($area_one, 140,'*');
        $expload_areay_one = explode('*',$area_one_chunk);
        //area two
        $area_two = strip_tags($this->AreaTwo);
        $area_two_chunk = chunk_split($area_two, 140,'*');
        $expload_areay_two = explode('*',$area_two_chunk);

        $age = Carbon::parse($this->DateOfBirth)->age;

        return [
            'ID'=> $this->ID,
            'StaffID'=> $this->StaffID,
            'AppraisalPeriod'=> $this->AppraisalPeriod,
            'from_period'=> $from_period,
            'to_period'=>$to_period,
            'AreaOne'=> $this->AreaOne,
            'AreaTwo'=> $this->AreaTwo,
            'CreatedDate'=> date('F j, Y',strtotime($this->CreatedDate)),
            'CurrentPosition'=> $this->CurrentPosition,
            'Department'=> $this->Department,
            'Designation'=> $this->Designation,
            'Signature'=> $this->Signature,
            'EmployeeName'=> $this->EmployeeName,
            'JoiningDate'=> date('Y-m-d',strtotime($this->JoiningDate)),
            'Mobile'=> $this->Mobile,
            'DateOfBirth'=> date('Y-m-d',strtotime($this->DateOfBirth)),
            'Age'=> $age,
            'OfficialEmail'=> $this->OfficialEmail,
            'PresentJobStartedOn'=> $this->PresentJobStartedOn ? date('Y-m-d',strtotime($this->PresentJobStartedOn)) : '',
            'Qualification'=> $this->Qualification,
            'SuppervisorDesignation'=> $this->SuppervisorDesignation,
            'SuppervisorEmail'=> $this->SuppervisorEmail,
            'SuppervisorMobile'=> $this->SuppervisorMobile,
            'SuppervisorName'=> $this->SuppervisorName,
            'SuppervisorStaffID'=> $this->SuppervisorStaffID,
            'initiative'=> $this->initiative,
            'training'=>$this->training,
            //'area'=>$this->area,

            //'AreaOneText'=> $this->Area,
            //'AreaTwoText'=> $this->AreaTwo,
        ];
    }
}

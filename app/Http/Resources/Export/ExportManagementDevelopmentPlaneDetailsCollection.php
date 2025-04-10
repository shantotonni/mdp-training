<?php

namespace App\Http\Resources\Export;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExportManagementDevelopmentPlaneDetailsCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        return [
            'data'=>$this->collection->transform(function ($mdp) use($empcode){

                if ($mdp->SuppervisorStaffID == $empcode){
                    $superVisor  = 'Y';
                }else{
                    $superVisor  = 'N';
                }
                $array =  [
                    'SubmittedDateAndTime'         => date('Y-m-d H:i:s', strtotime($mdp->CreatedDate)),
                    'AppraisalPeriod'              => $mdp->AppraisalPeriod,
                    'StaffID'                       => $mdp->StaffID,
                    'EmployeeName'      => $mdp->EmployeeName,
                    'Designation'       => $mdp->Designation,
                    'Department'        => $mdp->Department,
                    'Business'          => $mdp->Business,
                    'OfficialEmail'     => $mdp->OfficialEmail,
                    'Contact Number'    => $mdp->Mobile,
                    'Mobile'            => $mdp->Mobile,
                    'DateOfBirth'       => $mdp->DateOfBirth,
                    'JoiningDate'       => $mdp->JoiningDate,
                    'CurrentPosition'   => $mdp->CurrentPosition,
                    'PresentJobStartedOn'   => $mdp->PresentJobStartedOn,
                    'SuppervisorStaffID'    => $mdp->SuppervisorStaffID,
                    'SuppervisorName'       => $mdp->SuppervisorName,
                    'SuppervisorDesignation'   => $mdp->SuppervisorDesignation,
                    'SupervisorEmail'   => $mdp->SuppervisorEmail,
                    'MDPStatus'         => $mdp->MDPStatus,

                ];

                $count = 0;
                foreach ($mdp->initiative as $row){
                    $count++;
                    $array['PersonalTrainingTitle' .'-'. $count]     = isset($row['Name'])?$row['Name']:'';
                    $array['PersonalCompetencyType' .'-'. $count]    = isset($row['Type'])?$row['Type']:'';
                    $array['PersonalPlannedDate' .'-'. $count]     =isset($row['Date'])?$row['Date']:'';
                }
                foreach ($mdp->training as $row){
                    $count++;
                    $array['RequiredTrainingTitle' .'-'.$count]     = $row['TrainingTitle'];
                    $array['RequiredCompetencyType' .'-'. $count]   = $row['TrainingType'];
                    $array['RequiredPlannedDate' .'-'. $count]      = $row['TrainingDate'];
                }

                $array['FutureTrainingTitle-1']   = $mdp->FutureTrainingOne;
                $array['FutureTrainingDetails-1'] = $mdp->AreaOne;

                $array['FutureTrainingTitle-2']   = $mdp->FutureTrainingTwo ?? ''; // use null coalescing if it might not exist
                $array['FutureTrainingDetails-2'] = $mdp->AreaTwo ?? '';

                return $array;


            })
        ];
    }
}

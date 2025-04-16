<?php

namespace App\Http\Resources\Export;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExportManagementDevelopmentPlaneCollection extends ResourceCollection
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
                return [
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
                    'SuppervisorStaffID'   => $mdp->SuppervisorStaffID,
                    'SuppervisorName'   => $mdp->SuppervisorName,
                    'SuppervisorDesignation'   => $mdp->SuppervisorDesignation,
                    'SupervisorEmail'   => $mdp->SuppervisorEmail,
                    'MDPStatus'         => $mdp->MDPStatus,
                    'PersonalTrainings' => $mdp->initiative->map(function ($item) {
                        return [
                            'TrainingTitle'   => $item->Name,
                            'CompetencyType'  => $item->Type,
                            'PlannedDate'     => $item->Date,
                        ];
                    }),

                    'RequiredTrainings' => $mdp->training->map(function ($item) {
                        return [
                            'TrainingTitle'   => $item->TrainingTitle,
                            'CompetencyType'  => $item->TrainingType,
                            'PlannedDate'     => $item->TrainingDate,
                        ];
                    }),

//
//                    'PersonalTrainingTitle'             => isset($mdp->initiative[0]) ? $mdp->initiative[0]->Name: '',
//                    'PersonalCompetencyType'            => isset($mdp->initiative[0]) ? $mdp->initiative[0]->Type: '',
//                    'PersonalPlannedDate'               => isset($mdp->initiative[0]) ? $mdp->initiative[0]->Date: '',
//
//                    'RequiredTrainingTitle'             => isset($mdp->training[0]) ? $mdp->training[0]->TrainingTitle: '',
//                    'RequiredCompetencyType'            => isset($mdp->training[0]) ? $mdp->training[0]->TrainingType: '',
//                    'RequiredPlannedDate'               => isset($mdp->training[0]) ? $mdp->training[0]->TrainingDate: '',

                    'FutureTrainingTitle'   => $mdp->FutureTrainingOne,
                    'FutureTrainingDetails'   => $mdp->AreaOne,

                ];
            })
        ];
    }
}

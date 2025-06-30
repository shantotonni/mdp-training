<?php

namespace App\Http\Resources\MDP;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ManagementDevelopmentPlaneCollection extends ResourceCollection
{

    //to accept both additional data like mdpids
    protected $mdpIds;
    public function __construct($resource, $mdpIds)
    {
        parent::__construct($resource);
        $this->mdpIds = $mdpIds;
    }

    //got custom json resposne we use toarray
    public function toArray($request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        return [
            //transform for each mdp model formate
            'data'=>$this->collection->transform(function ($mdp) use($empcode){
                $superVisor = ($mdp->SuppervisorStaffID == $empcode)?'Y':'N';
                return [
                    'ID'                          => $mdp->ID,
                    'SubmittedDateAndTime'        => date('Y-m-d H:i:s', strtotime($mdp->CreatedDate)),
                    'AppraisalPeriod'             => $mdp->AppraisalPeriod,
                    'StaffID'                     => $mdp->StaffID,
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
                    'ApprovedDate'      => $mdp->ApprovedDate,
                    'SupervisorEmail'   => $mdp->SuppervisorEmail,
                    'P1'                => isset($mdp->initiative[0]) ? $mdp->initiative[0]->Name: '',
                    'P2'                => isset($mdp->initiative[1]) ? $mdp->initiative[1]->Name: '',
                    'P3'                => isset($mdp->initiative[2]) ? $mdp->initiative[2]->Name: '',
                    'P4'                => isset($mdp->initiative[3]) ? $mdp->initiative[3]->Name: '',
                    'P5'                => isset($mdp->initiative[4]) ? $mdp->initiative[4]->Name: '',

                    'T1'                => isset($mdp->training[0]) ? $mdp->training[0]->TrainingTitle: '',
                    'T2'                => isset($mdp->training[1]) ? $mdp->training[1]->TrainingTitle: '',
                    'T3'                => isset($mdp->training[2]) ? $mdp->training[2]->TrainingTitle: '',
                    'T4'                => isset($mdp->training[3]) ? $mdp->training[3]->TrainingTitle: '',
                    'T5'                => isset($mdp->training[4]) ? $mdp->training[4]->TrainingTitle: '',
//                    'C1'                => $mdp->AreaOne,
//                    'C2'                => $mdp->AreaTwo,
                    'C1'   => $mdp->FutureTrainingOne,
                    'C2'   => $mdp->AreaOne,
                    'C3'   => $mdp->FutureTrainingTwo,
                    'C4'   => $mdp->AreaTwo,
                    'MDPStatus'         => $mdp->MDPStatus,
                    'Supervisor'        => $superVisor,
                ];
            }),
            'mdpIds'=>$this->mdpIds,
        ];
    }
}

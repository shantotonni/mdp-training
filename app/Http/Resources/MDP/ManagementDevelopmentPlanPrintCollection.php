<?php

namespace App\Http\Resources\MDP;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ManagementDevelopmentPlanPrintCollection extends ResourceCollection
{

    //got custom json resposne we use toarray
    public function toArray($request)
    {
        return [
            //transform for each mdp model formate
            'data' => $this->collection->transform(function ($mdp) {
                $session = explode('-', $mdp->AppraisalPeriod);
                $from_period = $session[0] ?? '';
                $to_period = $session[1] ?? '';

                return [
                    'ID' => $mdp->ID,
                    'StaffID' => $mdp->StaffID,
                    'AppraisalPeriod' => $mdp->AppraisalPeriod,
                    'from_period' => $from_period,
                    'to_period' => $to_period,
                    'FutureTrainingOneDetails' => $mdp->FutureTrainingOneDetails,
                    'AreaOne' => $mdp->AreaOne,
                    'FutureTrainingTwoDetails' => $mdp->FutureTrainingTwoDetails,
                    'AreaTwo' => $mdp->AreaTwo,
                    'CreatedDate' => date('F j, Y', strtotime($mdp->CreatedDate)),
                    'CurrentPosition' => $mdp->CurrentPosition,
                    'Department' => $mdp->Department,
                    'Designation' => $mdp->Designation,
                    'Signature' => $mdp->Signature,
                    'EmployeeName' => $mdp->EmployeeName,
                    'JoiningDate' => date('Y-m-d', strtotime($mdp->JoiningDate)),
                    'Mobile' => $mdp->Mobile,
                    'DateOfBirth' => date('Y-m-d', strtotime($mdp->DateOfBirth)),
                    'OfficialEmail' => $mdp->OfficialEmail,
                    'PresentJobStartedOn' => $mdp->PresentJobStartedOn ? date('Y-m-d', strtotime($mdp->PresentJobStartedOn)) : '',
                    'Qualification' => $mdp->Qualification,
                    'SuppervisorDesignation' => $mdp->SuppervisorDesignation,
                    'SuppervisorEmail' => $mdp->SuppervisorEmail,
                    'SuppervisorMobile' => $mdp->SuppervisorMobile,
                    'SuppervisorName' => $mdp->SuppervisorName,
                    'SuppervisorStaffID' => $mdp->SuppervisorStaffID,
                    'initiative' => $mdp->initiative,
                    'training' => $mdp->training,
                    'MDPStatus' => $mdp->MDPStatus,
                ];
            }),

        ];
    }
}

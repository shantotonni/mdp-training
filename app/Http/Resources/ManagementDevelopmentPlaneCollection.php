<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManagementDevelopmentPlaneCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data'=>$this->collection->transform(function ($mdp){
                return [
                    'ID'=>$mdp->ID,
                    'StaffID'=>$mdp->StaffID,
                    'EmployeeName'=>$mdp->EmployeeName,
                    'Designation'=>$mdp->Designation,
                    'Department'=>$mdp->Department,
                    'OfficialEmail'=>$mdp->OfficialEmail,
                    'Contact Number'=>$mdp->Mobile,
                    'SupervisorEmail'=>$mdp->SuppervisorEmail,
                    'AppraisalPeriod'=>$mdp->AppraisalPeriod,
                    'Mobile'=>$mdp->Mobile,
                    'P1'=>isset($mdp->initiative[0]) ? $mdp->initiative[0]->Name: '',
                    'P2'=>isset($mdp->initiative[1]) ? $mdp->initiative[1]->Name: '',
                    'P3'=>isset($mdp->initiative[2]) ? $mdp->initiative[2]->Name: '',
                    'P4'=>isset($mdp->initiative[3]) ? $mdp->initiative[3]->Name: '',
                    'P5'=>isset($mdp->initiative[4]) ? $mdp->initiative[4]->Name: '',

                    'T1'=>isset($mdp->training[0]) ? $mdp->training[0]->TrainingTitle: '',
                    'T2'=>isset($mdp->training[1]) ? $mdp->training[1]->TrainingTitle: '',
                    'T3'=>isset($mdp->training[2]) ? $mdp->training[2]->TrainingTitle: '',
                    'T4'=>isset($mdp->training[3]) ? $mdp->training[3]->TrainingTitle: '',
                    'T5'=>isset($mdp->training[4]) ? $mdp->training[4]->TrainingTitle: '',
                    'C1'=>$mdp->AreaOne,
                    'C2'=>$mdp->AreaTwo,
                ];
            })
        ];
    }
}

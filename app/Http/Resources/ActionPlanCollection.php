<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActionPlanCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->transform(function ($action_plan){
                $session    = '2024-2025';
                if ($action_plan->ActionPlanPeriod == $session){
                    $isEdit = true;
                }else{
                    $isEdit = false;
                }
                return [
                    'ID'                        => $action_plan->ID,
                    'StaffID'                   => $action_plan->StaffID,
                    'EmployeeName'              => $action_plan->EmployeeName,
                    'Mobile'                    => $action_plan->Mobile,
                    'Designation'               => $action_plan->Designation,
                    'Department'                => $action_plan->Department,
                    'OfficialEmail'             => $action_plan->OfficialEmail,
                    'SuppervisorStaffID'        => $action_plan->SuppervisorStaffID,
                    'SupervisorName'            => $action_plan->SuppervisorName,
                    'SupervisorEmail'           => $action_plan->SuppervisorEmail,
                    'SupervisorMobile'          => $action_plan->SuppervisorMobile,
                    'SuppervisorDesignation'    => $action_plan->SuppervisorDesignation,
                    'Division'                  => $action_plan->Division,
                    'Business'                  => $action_plan->Business,
                    'ActionPlanPeriod'          => $action_plan->ActionPlanPeriod,
                    'isEdit'                    => $isEdit,
                    'Signature'                 => $action_plan->Signature,
                ];
            })
        ];
    }
}

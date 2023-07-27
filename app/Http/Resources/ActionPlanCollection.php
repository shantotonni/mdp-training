<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActionPlanCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->transform(function ($action_plan){
                return [
                    'ID'=>$action_plan->ID,
                    'StaffID'=>$action_plan->StaffID,
                    'EmployeeName'=>$action_plan->EmployeeName,
                    'Mobile'=>$action_plan->Mobile,
                    'Designation'=>$action_plan->Designation,
                    'Department'=>$action_plan->Department,
                    'OfficialEmail'=>$action_plan->OfficialEmail,
                    'SuppervisorStaffID'=>$action_plan->SuppervisorStaffID,
                    'SupervisorName'=>$action_plan->SuppervisorName,
                    'SupervisorEmail'=>$action_plan->SuppervisorEmail,
                    'SupervisorMobile'=>$action_plan->SuppervisorMobile,
                    'SuppervisorDesignation'=>$action_plan->SuppervisorDesignation,
                    'Division'=>$action_plan->Division,
                    'Business'=>$action_plan->Business,
                    'ActionPlanPeriod'=>$action_plan->ActionPlanPeriod,
                ];
            })
        ];
    }
}

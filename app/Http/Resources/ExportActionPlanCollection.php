<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExportActionPlanCollection extends ResourceCollection
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
                    'StaffID'=>$action_plan->StaffID,
                    'EmployeeName'=>$action_plan->EmployeeName,
                    'Designation'=>$action_plan->Designation,
                    'Division'=>$action_plan->Division,
                    'Department'=>$action_plan->Department,
                    'OfficialEmail'=>$action_plan->OfficialEmail,
                    'Mobile'=>$action_plan->Mobile,
                    'SupervisorName'=>$action_plan->SuppervisorName,
                    'SupervisorEmail'=>$action_plan->SuppervisorEmail,
                    'SupervisorMobile'=>$action_plan->SuppervisorMobile,
                    'SuppervisorDesignation'=>$action_plan->SuppervisorDesignation,
                    'ActionPlanPeriod'=>$action_plan->ActionPlanPeriod
                ];
            })
        ];
    }
}

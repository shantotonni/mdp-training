<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollection extends ResourceCollection
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
            'data'=>$this->collection->transform(function ($task){
                return [
                    'ID'=>$task->ID,
                    'EmployeeActionPlanID'=>$task->EmployeeActionPlanID,
                    'TaskName'=>$task->TaskName,
                    'TargetDateOfCompletion'=>date("F Y",strtotime($task->TargetDateOfCompletion)),
                    'CriterionOfMeasurement'=>$task->CriterionOfMeasurement,
                ];
            })
        ];
    }
}

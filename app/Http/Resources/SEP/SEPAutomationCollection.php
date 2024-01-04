<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SEPAutomationCollection extends ResourceCollection
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
        'data'=>$this->collection->transform(function ($sep){
          return[
              'SEPID'=>$sep->SEPID,
              'DivisionID'=>$sep->DivisionID,
              'PortfolioID'=>$sep->PortfolioID,
              'PortfolioName'=>isset($sep->portfolio) ? $sep->portfolio->PortfolioName: '',
              'DepartmentID'=>$sep->DepartmentID,
              'DepartmentName'=>isset($sep->department) ? $sep->department->DepartmentName: '',
              'DesignationID'=>$sep->DesignationID,
              'DesignationName'=>isset($sep->designation) ? $sep->designation->DesignationName: '',
              'SepFile'=>$sep->SepFile,
              'SubmittedDate'=>$sep->SubmittedDate,
              'Approval'=>$sep->Approval,
              'HeadCount'=>$sep->HeadCount,
              'Status'=>$sep->Status,
          ];
        }),
    ];
    }
}

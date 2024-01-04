<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExportSEPAutomationCollection extends ResourceCollection
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
              'PortfolioName'=>isset($sep->portfolio) ? $sep->portfolio->PortfolioName: '',
              'DepartmentName'=>isset($sep->department) ? $sep->department->DepartmentName: '',
              'DesignationName'=>isset($sep->designation) ? $sep->designation->DesignationName: '',
              'SubmittedDate'=>$sep->SubmittedDate,
              'Approval'=>$sep->Approval,
              'HeadCount'=>$sep->HeadCount,
              'Status'=>$sep->Status,
          ];
        }),
    ];
    }
}

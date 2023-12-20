<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\JsonResource;

class SEPAutomationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'SEPID'=>$this->SEPID,
            'DivisionID'=>$this->DivisionID,
            'PortfolioID'=>$this->PortfolioID,
            'PortfolioName'=>isset($this->portfolio) ? $this->portfolio->PortfolioName: '',
            'DepartmentID'=>$this->DepartmentID,
            'DepartmentName'=>isset($this->department) ? $this->department->DepartmentName: '',
            'DesignationID'=>$this->DesignationID,
            'DesignationName'=>isset($this->designation) ? $this->designation->DesignationName: '',
            'SepFile'=>$this->SepFile,
            'SubmittedDate'=>$this->SubmittedDate,
            'Approval'=>$this->Approval,
            'HeadCount'=>$this->HeadCount,
        ];
    }
}

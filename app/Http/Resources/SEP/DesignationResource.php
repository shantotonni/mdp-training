<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignationResource extends JsonResource
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
            'DesignationID'=>$this->DesignationID,
            'DesignationName'=>$this->DesignationName,
            'DesignationCode'=>$this->DesignationCode,
            'DepartmentID'=>$this->DepartmentID,
            'DepartmentName'=>isset($this->department)? $this->department->DepartmentName:'',
        ];
    }
}

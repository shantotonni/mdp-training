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
            'DivCode'=>$this->DivCode,
            'DeptCode'=>$this->DeptCode,
            'DeptName'=>isset($this->department)?$this->department->DeptName:'',
            'DesgCode'=>$this->DesgCode,
            'DesgtName'=>isset($this->designation)?$this->designation->DesgtName:'',
            'SepFile'=>$this->SepFile,
        ];
    }
}
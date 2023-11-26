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
              'DivCode'=>$sep->DivCode,
              'DeptCode'=>$sep->DeptCode,
              'ShortName'=>isset($sep->department) ? $sep->department->ShortName: '',
              'DesgCode'=>$sep->DesgCode,
              'Designation'=>isset($sep->designation) ? $sep->designation->DesgName: '',
              'SepFile'=>$sep->SepFile,
          ];
        }),
    ];
    }
}

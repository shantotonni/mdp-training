<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class DesignationCollection extends ResourceCollection
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
            'data'=>$this->collection->transform(function ($desig){
                return[
                  'DesignationID'=>$desig->DesignationID,
                  'DesignationName'=>$desig->DesignationName,
                  'DepartmentID'=>$desig->DepartmentID,
                  'DepartmentName'=>isset($desig->department)? $desig->department->DepartmentName:'',
                ];
            })
        ];
    }
}

<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'data'=>$this->collection->transform(function ($dept){
                return[
                'DepartmentID'=>$dept->DepartmentID,
                'DepartmentName'=>$dept->DepartmentName,
                'DepartmentCode'=>$dept->DepartmentCode,
//                'PortfolioID'=>$dept->PortfolioID,
//                'PortfolioName'=>isset($dept->portfolio)?$dept->portfolio->PortfolioName:'',
                ];
            })
        ];
    }
}

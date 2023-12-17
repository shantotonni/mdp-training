<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PortfolioCollection extends ResourceCollection
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
            'data'=>$this->collection->transform(function ($port){
                return[
                  'PortfolioID'=>$port->PortfolioID,
                  'DivCode'=>$port->DivisionID,
                  'PortfolioName'=>$port->PortfolioName,
                  'PortfolioCode'=>$port->PortfolioCode,
                ];
            }),
        ];
    }
}

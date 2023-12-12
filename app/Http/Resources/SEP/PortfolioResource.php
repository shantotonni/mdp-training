<?php

namespace App\Http\Resources\SEP;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{

    public function toArray($request)
    {
        return[
            'PortfolioID'=>$this->PortfolioID,
            'DivCode'=>$this->DivisionID,
            'PortfolioName'=>$this->PortfolioName,
            'PortfolioCode'=>$this->PortfolioCode,
        ];
    }
}

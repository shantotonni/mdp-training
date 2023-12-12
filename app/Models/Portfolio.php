<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    use HasFactory;

    protected $table = 'SEPPortfolio';

    protected $primaryKey = 'PortfolioID';

    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];

    public function division(){
        return $this->belongsTo(Division::class,'DivCode','DivCode');
    }

}

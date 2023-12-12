<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEPDepartment extends Model
{
    use HasFactory;
    protected $table = 'SEPDepartment';

    protected $primaryKey = 'DepartmentID';

    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class,'PortfolioID','PortfolioID');
    }
}

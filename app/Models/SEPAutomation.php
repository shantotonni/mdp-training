<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEPAutomation extends Model
{
    use HasFactory;
    protected $table = "SEPAutomation";
    public $primaryKey = 'SEPID';
    protected $guarded = [];
    public $timestamps = false;

    public function division(){
        return $this->belongsTo(Division::class,'DivisionID','DivCode');
    }
    public function department(){
        return $this->belongsTo(SEPDepartment::class,'DepartmentID','DepartmentID');
    }
    public function designation(){
        return $this->belongsTo(SEPDesignation::class,'DesignationID','DesignationID');
    }
    public function portfolio(){
        return $this->belongsTo(Portfolio::class,'PortfolioID','PortfolioID');
    }
}

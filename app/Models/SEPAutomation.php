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
        return $this->belongsTo(Division::class,'DivCode','DivCode');
    }
    public function department(){
        return $this->belongsTo(Department::class,'DeptCode','DeptCode');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'DesgCode','DesgCode');
    }
}

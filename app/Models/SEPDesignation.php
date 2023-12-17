<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEPDesignation extends Model
{
    use HasFactory;
    protected $table = 'SEPDesignation';

    protected $primaryKey = 'DepartmentID';

    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];

    public function department(){
        return $this->belongsTo(SEPDepartment::class,'DepartmentID','DepartmentID');
    }
}

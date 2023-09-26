<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    use HasFactory;

    protected $table = 'EmployeeJobDescription';

    public $primaryKey = 'ID';
    protected $guarded = [];
    public $timestamps = true;

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function details(){
        return $this->hasMany(JobResponsibilities::class,'JDID','ID');
    }
}

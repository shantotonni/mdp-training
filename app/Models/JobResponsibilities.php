<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResponsibilities extends Model
{
    use HasFactory;

    protected $table = 'EmployeeJobResponsibilities';

    public $primaryKey = 'EmployeeJobRespID';
    protected $guarded = [];

    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    use HasFactory;

    protected $table = 'SalaryGrade';

    protected $primaryKey = 'SalaryGradeID';

    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

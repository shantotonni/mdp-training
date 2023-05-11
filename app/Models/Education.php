<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'Education';

    protected $primaryKey = 'EmpCode';
    public $timestamps = false;
    protected $guarded = [];
}

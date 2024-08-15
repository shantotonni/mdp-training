<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDeposit extends Model
{
    use HasFactory;

    protected $table = 'TaxDeposit';
    protected $primaryKey = 'EmpCode';
    public $timestamps = false;
    protected $guarded = [];
}

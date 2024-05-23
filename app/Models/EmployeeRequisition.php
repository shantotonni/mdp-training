<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRequisition extends Model
{
    use HasFactory;
    protected $table = 'EmployeeRequisition';

    protected $primaryKey = 'RequisitionID';

    // protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

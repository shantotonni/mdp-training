<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDPEmployeeTrainingList extends Model
{
    use HasFactory;

    protected $table = 'MDPEligibleEmployeeTrainingList';
    protected $primaryKey = 'ID';
    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

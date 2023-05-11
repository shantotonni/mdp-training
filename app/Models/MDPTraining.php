<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDPTraining extends Model
{
    use HasFactory;

    protected $table = 'MDPTraining';
    protected $primaryKey = 'ID';
    protected $guarded = [];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionSpecification extends Model
{
    use HasFactory;
    protected $table = 'RequisitionSpecification';

    protected $primaryKey = false;

    // protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

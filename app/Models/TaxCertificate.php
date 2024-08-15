<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCertificate extends Model
{
    use HasFactory;

    protected $table = 'TaxCertificate';
    protected $primaryKey = 'EmpCode';
    public $timestamps = false;
    protected $guarded = [];
}

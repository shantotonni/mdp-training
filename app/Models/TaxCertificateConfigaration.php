<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCertificateConfigaration extends Model
{
    use HasFactory;

    protected $table = 'TaxCertificateConfigaration';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = [];
}

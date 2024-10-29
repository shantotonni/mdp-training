<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxZone extends Model
{
    use HasFactory;
    protected $table = 'TaxZone';
    protected $primaryKey = 'TaxZoneId';
    public $timestamps = false;
    protected $guarded = [];
}

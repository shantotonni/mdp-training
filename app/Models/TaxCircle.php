<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCircle extends Model
{
    use HasFactory;
    protected $table = 'TaxCircle';
    protected $primaryKey = 'TaxCircleId';
    public $timestamps = false;
    protected $guarded = [];
}

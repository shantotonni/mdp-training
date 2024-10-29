<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRA extends Model
{
    use HasFactory;
    protected $table = 'TaxReturnAcknowledgement';
    protected $primaryKey = 'TRAId';
    public $timestamps = false;
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDPEligibleList extends Model
{
    use HasFactory;
    protected $table='MDPEligibleList';
    protected $primaryKey=false;
    protected $guarded=[];
    public $timestamps=true;
}

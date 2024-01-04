<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEPAutomationLog extends Model
{
    use HasFactory;

    protected $table = "SEPAutomationLog";
    public $primaryKey = 'SEPLogID';
    protected $guarded = [];
    public $timestamps = false;
}

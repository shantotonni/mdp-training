<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendOTP extends Model
{
    use HasFactory;
    protected $table = 'SendOTP';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $guarded = [];
}

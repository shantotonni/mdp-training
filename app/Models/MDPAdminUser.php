<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDPAdminUser extends Model
{
    use HasFactory;

    protected $table = 'MDPAdminUser';

    protected $primaryKey = 'ID';
   // protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

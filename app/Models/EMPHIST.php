<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPHIST extends Model
{
    use HasFactory;

    protected $table = 'EMPHIST';

    protected $primaryKey = 'EMPCODE';

    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

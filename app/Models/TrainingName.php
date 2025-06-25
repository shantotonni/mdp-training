<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingName extends Model
{
    use HasFactory;
    protected $table = 'TrainingName';
    protected $primaryKey = 'TrnCode';
    public $timestamps = false;
    protected $guarded = [];
}

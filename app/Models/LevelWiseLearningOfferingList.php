<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelWiseLearningOfferingList extends Model
{
    use HasFactory;

    protected $table = 'LevelWiseLearningOfferingList';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

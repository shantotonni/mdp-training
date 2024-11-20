<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaHub extends Model
{
    use HasFactory;
    protected $table = 'MDPIdeaHub';

    protected $primaryKey = 'IdeaHubID';

    // protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

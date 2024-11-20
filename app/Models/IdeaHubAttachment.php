<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaHubAttachment extends Model
{
    use HasFactory;
    protected $table = 'MDPIdeaHubAttachment';

    protected $primaryKey = 'IdeaAttachmentID';

    // protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = [];
}

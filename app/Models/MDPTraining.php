<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDPTraining extends Model
{
    use HasFactory;

    protected $table = 'MDPTraining';
    protected $primaryKey = 'ID';
    protected $guarded = [];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function feedback(){
        return $this->hasOne(MDPTrainingFeedback::class,'TrainingID','ID');
    }
    public function mdp(){
        return $this->belongsTo(ManagementDevelopmentPlane::class,'MDPID','ID');
    }
}

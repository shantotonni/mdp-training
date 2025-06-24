<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementDevelopmentPlane extends Model
{
    use HasFactory;

    protected $table = "ManagementDevelopmentPlane";
    public $primaryKey = 'ID';
    protected $guarded = [];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function initiative(){
        return $this->hasMany(MDPPersonalInitiative::class,'MDPID','ID');
    }
    public function training(){
        return $this->hasMany(MDPTraining::class,'MDPID','ID');
    }
    public function areaOneTraining() {
        return $this->belongsTo(MDPTraining::class, 'AreaOne', 'TrainingCode');
    }

    public function areaTwoTraining() {
        return $this->belongsTo(MDPTraining::class, 'AreaTwo', 'TrainingCode');
    }
//    public function area(){
//        return $this->hasMany(Area::class,'MDPID','ID');
//    }
}

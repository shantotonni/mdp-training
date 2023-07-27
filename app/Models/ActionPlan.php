<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActionPlan extends Model
{
    use HasFactory;

    protected $table = 'EmployeeActionPlan';

    protected $primaryKey = 'ID';
    protected $guarded = [];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function task(){
        return $this->hasMany(ActionPlanTask::class,'EmployeeActionPlanID','ID')
            ->select('ID','EmployeeActionPlanID','TaskName','TargetDateOfCompletion','CriterionOfMeasurement');
    }
}

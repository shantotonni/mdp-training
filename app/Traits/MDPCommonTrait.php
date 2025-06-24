<?php

namespace App\Traits;


use App\Models\MDPEligibleList;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

trait MDPCommonTrait
{
     public function mdpEligibleList($empCode , $period){
         $eligible = DB::table('MDPEligibleList as m')
             ->select('m.StaffId')
             ->join('Employer as e','e.EmpCode','=','m.StaffId')
             ->join('Personal as p','p.EmpCode','=','m.StaffId')
             ->where('p.Active','=','Y')
             ->where('m.Period','=',$period)
             ->where('m.StaffId','=',$empCode)
             ->where(DB::raw('LEFT(Grade,2)'),'=','OM')
             ->get();
         return $eligible;
     }

}
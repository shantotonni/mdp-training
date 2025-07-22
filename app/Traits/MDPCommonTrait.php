<?php

namespace App\Traits;


use App\Models\Department;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPEligibleList;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Tymon\JWTAuth\Facades\JWTAuth;

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

     public function mdpIds($empcode,$role,$status,$session,$Business,$Department,$EmployeeList){
         if ($role == 'admin'){

             $mdp = ManagementDevelopmentPlane::query();
             if (empty($Department)){
                 if (!empty($Business) && isset($Business)) {
                     $Business = collect($Business);

                     // Optional: clean up DeptName values if needed
                     $Business = $Business->map(function ($item) {
                         $item->business = preg_replace('/\s+and\s+/i', ' & ', $item->business);
                         $item->business = preg_replace('/\s+/', ' ', $item->business);
                         $item->business = trim($item->business);
                         return $item;
                     });

                     $BusinessName = $Business->pluck('business');

                     $Departments = Department::select('DeptName')->whereIn('DeptUnit',$BusinessName->toArray())->get();
                     $deptlist=[];
                     foreach ($Departments as $val) {
                         $deptlist[] = $val->DeptName;
                     }

                     $mdp = $mdp->whereIn('Department', $deptlist);
                 }
             }else{

                 if (!empty($Department) && isset($Department)) {
                     $Department = collect($Department);

                     // Optional: clean up DeptName values if needed
                     $Department = $Department->map(function ($item) {
                         $item->DeptName = preg_replace('/\s+and\s+/i', ' & ', $item->DeptName);
                         $item->DeptName = preg_replace('/\s+/', ' ', $item->DeptName);
                         $item->DeptName = trim($item->DeptName);
                         return $item;
                     });
                     $DeptName = $Department->pluck('DeptName');

                     $mdp = $mdp->whereIn('Department', $DeptName->toArray());
                 }
             }

             if (!empty($EmployeeList) && isset($EmployeeList)){
                 $EmployeeList = collect($EmployeeList);
                 $EmployeeIDs = $EmployeeList->pluck('StaffID');
                 $mdp = $mdp->whereIn('StaffID',$EmployeeIDs);
             }
             if ($session){
                 $mdp = $mdp->where('AppraisalPeriod',$session);
             }
             $mdp = $mdp->orderBy('ID','desc')->whereNotNull('StaffID');
         }else{

             $mdp = ManagementDevelopmentPlane::query();

             if (!empty($Department) && isset($Department)){
                 $Department = collect($Department);
                 $DeptName = $Department->pluck('DeptName');
                 $mdp = $mdp->whereIn('Department',$DeptName);
             }
             if ($session){
                 $mdp = $mdp->where('AppraisalPeriod',$session);
             }
             $mdp = $mdp->orderBy('ID','desc')
                 ->where(function ($query) use($empcode){
                     $query->where('StaffID',$empcode);
                     $query->orWhere('SuppervisorStaffID', $empcode);
                 })
                 ->whereNotNull('StaffID');
         }
         if ($status){
             $mdp->where('MDPStatus','=',$status);
         }
         $mdpIds = $mdp->pluck('ID')->implode(',');
         return $mdpIds;
     }

}
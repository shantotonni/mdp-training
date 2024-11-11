<?php

namespace App\Http\Controllers;

use App\Http\Resources\Student\StudentCollection;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Department;
use App\Models\MDPEmployeeTrainingList;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Sessions;
use App\Models\Student;
use App\Models\StudentBill;
use App\Models\StudentBillPayment;
use App\Models\TaxCertificate;
use App\Models\Year;
use App\Services\BusinessService;
use App\Services\DepartmentService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommonController extends Controller
{
    public function getEmployeeTrainingList(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];
        if ($role == 'admin'){
            $training_list = MDPEmployeeTrainingList::all();
        }else{
            $training_list = MDPEmployeeTrainingList::where('StaffID', $empcode)->get();
        }
        return response()->json([
            'training_list' => $training_list
        ]);
    }

    public function getAgreeBusinessUser(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $staffCode = $payload['staffCode'];

        $training_list = MDPEmployeeTrainingList::where('StaffID', $staffCode)->where('isDropDown','Y')->first();

        if (!empty($training_list)){
            $dropDown = 'YES';
        }else{
            $dropDown = 'NO';
        }

        return response()->json([
            'dropDown' => $dropDown
        ]);
    }

    public function getAllSession(){
        $sessions = DB::select('select distinct AppraisalPeriod as Name from ManagementDevelopmentPlane');
        return response()->json([
            'sessions'=>$sessions
        ]);
    }

    public function department(){
        $list = Department::select('DeptCode','DeptName')->where('Active','Y')->get();
        return response()->json([
           'data'=>$list
        ]);
    }

}

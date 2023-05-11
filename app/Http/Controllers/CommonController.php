<?php

namespace App\Http\Controllers;

use App\Http\Resources\Student\StudentCollection;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Currency;
use App\Models\MDPEmployeeTrainingList;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Sessions;
use App\Models\Student;
use App\Models\StudentBill;
use App\Models\StudentBillPayment;
use App\Models\Year;
use App\Services\BusinessService;
use App\Services\DepartmentService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommonController extends Controller
{
    public function getEmployeeTrainingList(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $training_list = MDPEmployeeTrainingList::where('StaffID', $empcode)->get();
        return response()->json([
            'training_list' => $training_list
        ]);
    }
}

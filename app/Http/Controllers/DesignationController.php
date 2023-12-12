<?php

namespace App\Http\Controllers;

use App\Http\Resources\SEP\DesignationCollection;
use App\Models\SEPDesignation;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DesignationController extends Controller
{
    public function index(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $role = $payload['Type'];
        if ($role == 'admin'){
            $DepartmentID = $request->DepartmentID;
            $dept = SEPDesignation::query();
            if ($DepartmentID){
                $dept = $dept->where('DepartmentID',$DepartmentID);
            }
            $dept = $dept->orderBy('DepartmentID','desc')->paginate(15);

        }else{
            $dept = SEPDesignation::with('department')->orderBy('DepartmentID','desc')->paginate(15);
        }
        return new DesignationCollection($dept);
    }
}

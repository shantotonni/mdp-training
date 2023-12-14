<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\DesignationStoreRequest;
use App\Http\Resources\SEP\DepartmentCollection;
use App\Http\Resources\SEP\DesignationCollection;
use App\Models\SEPDepartment;
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

    public function allDepartment(){
        $Department = SEPDepartment::orderBy('DepartmentID', 'desc')->get();
        return new DepartmentCollection($Department);
    }

    public function store(DesignationStoreRequest $request){

        try {
            $dept = new SEPDesignation();
            $dept->DepartmentID = $request->DepartmentID;
            $dept->DesignationCode = $request->DesignationCode;
            $dept->DesignationName = $request->DesignationName;
            $dept->save();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function update(DesignationStoreRequest $request,$DesignationID){
        try {
            $dept = SEPDesignation::where('DesignationID',$DesignationID)->first();
            $dept->DepartmentID = $request->DepartmentID;
            $dept->DesignationCode = $request->DesignationCode;
            $dept->DesignationName = $request->DesignationName;
            $dept->save();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
    public function search($query)
    {
        return new DesignationCollection(SEPDesignation::where('DesignationName','LIKE',"%$query%")->paginate(10));
    }
}

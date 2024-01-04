<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\DesignationStoreRequest;
use App\Http\Resources\SEP\DepartmentCollection;
use App\Http\Resources\SEP\DesignationCollection;
use App\Models\SEPDepartment;
use App\Models\SEPDesignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class DesignationController extends Controller
{
    public function index(){
            $dept = SEPDesignation::paginate(15);
        return new DesignationCollection($dept);
    }

    public function allDepartment(){
        $Department = SEPDepartment::orderBy('DepartmentID', 'desc')->get();
        return new DepartmentCollection($Department);
    }

    public function store(DesignationStoreRequest $request){
        $exists = SEPDesignation::where('DesignationName','=',$request->DesignationName)->count();
        if($exists) {
            return response()->json([
                'status' => 'success',
                'message'=>'Designation Name need to be unique!'
            ]);
        }

        try {
            $dept = new SEPDesignation();
//            $dept->DepartmentID = $request->DepartmentID;
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
        $exists = SEPDesignation::where('DesignationID',$request->DesignationID)
            ->where('DesignationName','!=',$request->DesignationName)->count();
        if($exists) {
            $exist2 = SEPDesignation::where('DesignationName','=',$request->DesignationName)->count();
            if($exist2) {
                return response()->json([
                    'status' => 'success',
                    'message'=>'Designation Name need to be unique!'
                ]);
            }
        }
        try {
            $dept = SEPDesignation::where('DesignationID',$DesignationID)->first();
//            $dept->DepartmentID = $request->DepartmentID;
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

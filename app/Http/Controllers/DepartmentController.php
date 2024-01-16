<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\DepartmentStoreRequest;
use App\Http\Resources\SEP\DepartmentCollection;
use App\Http\Resources\SEP\PortfolioCollection;
use App\Models\Portfolio;
use App\Models\SEPDepartment;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DepartmentController extends Controller
{
    public function index(){
            $dept = SEPDepartment::paginate(15);
        return new DepartmentCollection($dept);
    }

    public function allPortfolio(){
        $Portfolio = Portfolio::orderBy('PortfolioID', 'desc')->get();
        return new PortfolioCollection($Portfolio);
    }
    public function search($query)
    {
        return new DepartmentCollection(SEPDepartment::where('DepartmentName','LIKE',"%$query%")->paginate(10));
    }

    public function store(DepartmentStoreRequest $request){
        $exists = SEPDepartment::where('DepartmentName','=',$request->DepartmentName)->count();
        if($exists) {
            return response()->json([
                'status' => 'success',
                'message'=>'Department Name need to be unique!'
            ]);
        }
        try {
            $dept = new SEPDepartment();
            $dept->DepartmentCode = $request->DepartmentCode;
            $dept->DepartmentName = $request->DepartmentName;
            $dept->save();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function update(DepartmentStoreRequest $request,$DepartmentID){
        $exists = SEPDepartment::where('DepartmentID',$request->DepartmentID)
            ->where('DepartmentName','!=',$request->DepartmentName)->count();
        if($exists) {
            $exist2 = SEPDepartment::where('DepartmentName','=',$request->DepartmentName)->count();
            if($exist2) {
                return response()->json([
                    'status' => 'success',
                    'message'=>'Department Name need to be unique!'
                ]);
            }
        }
        try {
            $dept = SEPDepartment::where('DepartmentID',$DepartmentID)->first();
//            $dept->PortfolioID = $request->PortfolioID;
            $dept->DepartmentCode = $request->DepartmentCode;
            $dept->DepartmentName = $request->DepartmentName;
            $dept->save();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
}

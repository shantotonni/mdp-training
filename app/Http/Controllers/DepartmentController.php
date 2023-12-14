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
    public function index(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $role = $payload['Type'];
        if ($role == 'admin'){
            $PortfolioID = $request->PortfolioID;
            $dept = SEPDepartment::query();
            if ($PortfolioID){
                $dept = $dept->where('PortfolioID',$PortfolioID);
            }
            $dept = $dept->orderBy('PortfolioID','desc')->paginate(15);

        }else{
            $dept = SEPDepartment::with('portfolio')->orderBy('PortfolioID','desc')->paginate(15);
        }

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

        try {
            $dept = new SEPDepartment();
            $dept->PortfolioID = $request->PortfolioID;
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
        try {
            $dept = SEPDepartment::where('DepartmentID',$DepartmentID)->first();
            $dept->PortfolioID = $request->PortfolioID;
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

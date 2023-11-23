<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\SEPAutomationStoreRequest;
use App\Http\Resources\SEP\SEPAutomationCollection;
use App\Models\SEPAutomation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class SEPAutomationController extends Controller
{
    public function index(Request $request)
    {
//        $token = $request->bearerToken();
//        $payload = JWTAuth::setToken($token)->getPayload();
//        $empcode = $payload['EmpCode'];
//        $role = $payload['Type'];
//
//        $DivCode = $request->DivCode;
//        $DeptCode = $request->DeptCode;
//        $DesgCode= $request->DesgCode;
//
//        if ($role == 'admin'){
//            $sep = SEPAutomation::query();
//            if ($DivCode||$DeptCode||$DesgCode){
//                $sep = $sep->where('DivCode',$DivCode);
//                $sep = $sep->where('DeptCode',$DeptCode);
//                $sep = $sep->where('DesgCode',$DesgCode);
//            }
//            $sep = $sep->orderBy('SEPID','desc')->paginate(15);
//        }else{
//            $sep = SEPAutomation::orderBy('SEPID','desc')->where('StaffID',$empcode)->paginate(15);
//        }
        $sep = SEPAutomation::with('department','designation','division')->orderBy('SEPID','desc')->paginate(15);
        return new SEPAutomationCollection($sep);
    }
    public function store(SEPAutomationStoreRequest $request){
        if ($request->has('SepFile')) {
            $SepFile = $request->SepFile;
            $name = uniqid() . time() . '.' . explode('/', explode(':', substr($SepFile, 0, strpos($SepFile, ';')))[1])[1];
            Image::make($SepFile)->save(public_path('file/SEP/') . $name);
        } else {
            $name = 'not_found.jpg';
        }
        try {
            $sep= new SEPAutomation();
            $sep->DivCode= $request->DivCode ;
            $sep->DeptCode= $request->DeptCode ;
            $sep->DesgCode= $request->DesgCode ;
            $sep->SepFile= $name ;
            $sep->CreatedDate= Carbon::now() ;
            $sep->save() ;
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
    public function update(SEPAutomationStoreRequest $request, $SEPID){
        try {
            $sep = SEPAutomation::where('SEPID', $SEPID)->first();

        $SepFile = $request->SepFile;
        if ($request->has('SepFile')) {
            //code for remove old file
            if ($sep->SepFile != '' && $sep->SepFile != null) {
                $destinationPath = 'file/SEP/';
                $file_old = public_path('/') . $destinationPath . $sep->SepFile;
                if (file_exists($file_old)) {
                    unlink($file_old);
                }
            }
            $name = uniqid() . time() . '.' . explode('/', explode(':', substr($SepFile, 0, strpos($SepFile, ';')))[1])[1];
            Image::make($SepFile)->save(public_path('file/SEP/') . $name);
        } else {
            $name = $sep->SepFile;
        }

            $sep->DivCode= $request->DivCode ;
            $sep->DeptCode= $request->DeptCode ;
            $sep->DesgCode= $request->DesgCode ;
            $sep->SepFile= $name ;
            $sep->UpdatedDate= Carbon::now() ;
            $sep->save() ;
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
    public function allDivision(){
        $deptunit = DB::select(DB::raw(" SELECT DISTINCT [Deptunit] FROM Department WHERE Active = 'Y' AND DeptUnit <> ''"));
        return response()->json([
           'data'=>$deptunit
        ]);
    }
    public function allDepartment(Request $request){
        $deptunit=$request->DivCode;
        $departments = DB::select("SELECT DeptCode, ShortName FROM Department where Active = 'Y' and DeptUnit = '$deptunit'");
        return response()->json([
            'data'=>$departments
        ]);
    }
    public function allDesignation(){
        $designation = DB::select("SELECT DesgCode, DesgName FROM Designation WHERE Active = 'Y'");
        return response()->json([
            'data'=>$designation
        ]);
    }
}

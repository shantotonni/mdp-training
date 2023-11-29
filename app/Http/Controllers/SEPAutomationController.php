<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\SEPAutomationStoreRequest;
use App\Http\Resources\SEP\SEPAutomationCollection;
use App\Http\Resources\SEP\SEPAutomationResource;
use App\Models\SEPAutomation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class SEPAutomationController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $role = $payload['Type'];

        $DivCode = $request->DivCode;
        $DeptCode = $request->DeptCode;
        $DesigCode = json_decode($request->DesigCode);
        if ($role == 'admin'){
            $sep = SEPAutomation::query();
            if ($DivCode || $DeptCode||$DesigCode){
                $DesgCode = $DesigCode->DesgCode;
                $sep = $sep->where('DivCode',$DivCode)
                    ->orwhere('DeptCode',$DeptCode)
                    ->orwhere('DesgCode',$DesgCode);
            }
            $sep = $sep->orderBy('SEPID','desc')->where('CreatedBy',$empcode)->paginate(15);

        }else{
            $sep = SEPAutomation::with('department','designation','division')->orderBy('SEPID','desc')->where('CreatedBy',$empcode)->paginate(15);
        }

        return new SEPAutomationCollection($sep);
    }
    public function store(SEPAutomationStoreRequest $request){
        $DesgCode=$request->DesgCode;
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        if ($request->has('SepFile')) {
            $SepFile = $request->SepFile;
            $name = uniqid() . time() . '.' . explode('/', explode(':', substr($SepFile, 0, strpos($SepFile, ';')))[1])[1];
            Image::make($SepFile)->save(public_path('file/SEP/') . $name);
        } else {
            $name = 'not_found.jpg';
        }
        try {
            $sep= new SEPAutomation();
            $sep->CreatedBy= $empcode;
            $sep->DivCode= $request->DivCode ;
            $sep->DeptCode= $request->DeptCode ;
            //dd(json_decode($DesgCode['DesgCode']));
            $sep->DesgCode= json_decode($DesgCode['DesgCode']);
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
        $DesgCode=$request->DesgCode;
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        try {
            $sep = SEPAutomation::where('SEPID', $SEPID)->first();
        $SepFile = $request->SepFile;
        if ($request->has('SepFile')) {
            $destinationPath = '/file/SEP/';
            $file_old = public_path() . $destinationPath . $sep->SepFile;
            if (file_exists($file_old)) {
                unlink($file_old);
            }
            //code for remove old file
            $name = uniqid() . time() . '.' . explode('/', explode(':', substr($SepFile, 0, strpos($SepFile, ';')))[1])[1];
            Image::make($SepFile)->save(public_path('file/SEP/') . $name);

        } else {
            $name = $sep->SepFile;
        }

            $sep->DivCode= $request->DivCode ;
            $sep->DeptCode= $request->DeptCode ;
            $sep->DesgCode= json_decode($DesgCode['DesgCode']);
            $sep->SepFile= $name ;
            $sep->UpdatedDate= Carbon::now() ;
            $sep->EditBy= $empcode ;

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
        $deptunit2=$request->DivCode2;
        if ($deptunit ||$deptunit2 ){
            $departments = DB::select("SELECT DeptCode, ShortName FROM Department where Active = 'Y' and DeptUnit in('$deptunit','$deptunit2' )");
            return response()->json([
                'data'=>$departments
            ]);
        }

    }
    public function allDesignation(){
        $designation = DB::select("SELECT DesgCode, DesgName FROM Designation WHERE Active = 'Y'");
        return response()->json([
            'data'=>$designation
        ]);
    }
    public function search($query)
    {
        return new SEPAutomationCollection(SEPAutomation::where('DivCode','LIKE',"%$query%")->paginate(10));
    }
}

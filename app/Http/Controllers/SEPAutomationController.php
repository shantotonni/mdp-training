<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\SEPAutomationStoreRequest;
use App\Http\Resources\SEP\SEPAutomationCollection;
use App\Models\SEPAutomation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        $DivisionID = $request->DivisionID;
        $PortfolioID = $request->PortfolioID;
        $DepartmentID = $request->DepartmentID;
        $Designation = $request->DesignationID;
        $DesignationID = json_decode($request->DesignationID);
        if ($role == 'admin'){
            $sep = SEPAutomation::query();
            if ($DivisionID ||$PortfolioID || $DepartmentID||$DesignationID){
                $DesignationID = $DesignationID->DesignationID;
                $sep = $sep->where('DivisionID',$DivisionID)
                    ->orwhere('PortfolioID',$PortfolioID)
                    ->orwhere('DepartmentID',$DepartmentID)
                    ->orwhere('DesignationID',$DesignationID);
            }
            $sep = $sep->orderBy('SEPID','desc')->where('CreatedBy',$empcode)->paginate(15);

        }else{
            $sep = SEPAutomation::with('department','designation','division','portfolio')->orderBy('SEPID','desc')->where('CreatedBy',$empcode)->paginate(15);
        }

        return new SEPAutomationCollection($sep);
    }
    public function store(SEPAutomationStoreRequest $request){
        $DesignationID=$request->DesignationID;
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];


        $requestFile = $request->SepFile;
        $destination =public_path('file/SEP/');
        list($type, $file) = explode(';', $requestFile);
        list(, $extension) = explode('/', $type);
        list(, $file) = explode(',', $file);
        $fileNameToStore = time() . rand(1, 100000000) . '.' . $extension;
        $source = fopen($requestFile, 'r');
        $destination = fopen($destination . $fileNameToStore, 'w');
        stream_copy_to_stream($source, $destination);
        fclose($source);
        fclose($destination);
        try {
            $sep= new SEPAutomation();
            $sep->CreatedBy= $empcode;
            $sep->DivisionID= $request->DivisionID ;
            $sep->DepartmentID= $request->DepartmentID ;
            $sep->PortfolioID= $request->PortfolioID ;
            $sep->DesignationID= json_decode($DesignationID['DesignationID']);
            $sep->SepFile= $fileNameToStore ;
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
        $DesignationID=$request->DesignationID;
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        try {
            $sep = SEPAutomation::where('SEPID', $SEPID)->first();
            $requestFile = $request->SepFile;
            $destination =public_path('file/SEP/');
            list($type, $file) = explode(';', $requestFile);
            list(, $extension) = explode('/', $type);
            list(, $file) = explode(',', $file);
            $fileNameToStore = time() . rand(1, 100000000) . '.' . $extension;
            $source = fopen($requestFile, 'r');
            $destination = fopen($destination . $fileNameToStore, 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);

            $sep->DivisionID= $request->DivisionID ;
            $sep->DepartmentID= $request->DepartmentID ;
            $sep->PortfolioID= $request->PortfolioID ;
            $sep->DesignationID= json_decode($DesignationID['DesignationID']);
            $sep->SepFile= $fileNameToStore ;
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
    public function allPortfolio(Request $request){

        $deptunit=$request->DivisionID;
        $deptunit2=$request->DivisionID2;
        if ($deptunit ||$deptunit2 ){
            $portfolio = DB::select("SELECT PortfolioID, PortfolioName FROM SEPPortfolio where DivisionID in('$deptunit','$deptunit2' )");

            return response()->json([
                'data'=>$portfolio
            ]);
        }

    }
    public function allDepartment(Request $request){
        $deptunit=$request->PortfolioID;
        $deptunit2=$request->PortfolioID2;
        if ($deptunit ||$deptunit2 ){
            $departments = DB::select("SELECT DepartmentID, DepartmentName FROM SEPDepartment where PortfolioID in('$deptunit','$deptunit2' )");
            return response()->json([
                'data'=>$departments
            ]);
        }

    }
    public function allDesignation(Request $request){
        $deptunit=$request->DepartmentID;
        $deptunit2=$request->DepartmentID2;
        if ($deptunit ||$deptunit2 ){
            $designations = DB::select("SELECT DesignationID, DesignationName FROM SEPDesignation where DepartmentID in('$deptunit','$deptunit2' )");
            if ($designations){
                return response()->json([
                    'data'=>$designations
                ]);
            }else{
                return response()->json([
                    'data'=>[]
                ]);
            }

        }
    }

    public function search($query)
    {
        return new SEPAutomationCollection(SEPAutomation::where('DivisionID','LIKE',"%$query%")->paginate(10));
    }
}

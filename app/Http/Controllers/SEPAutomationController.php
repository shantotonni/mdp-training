<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\SEPAutomationStoreRequest;
use App\Http\Resources\SEP\DesignationCollection;
use App\Http\Resources\SEP\ExportSEPAutomationCollection;
use App\Http\Resources\SEP\SEPAutomationCollection;
use App\Models\SEPAutomation;
use App\Models\SEPAutomationLog;
use App\Models\SEPDesignation;
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
        $Designation = json_decode($request->DesignationID);

        $sep = SEPAutomation::query()->with('department','designation','division','portfolio');
        if (!empty($DivisionID)){
            $sep = $sep->where('DivisionID',$DivisionID);
        }
        if (!empty($PortfolioID)){
            $sep = $sep->where('PortfolioID',$PortfolioID);
        }
        if (!empty($DepartmentID)){
            $sep = $sep->where('DepartmentID',$DepartmentID);
        }
        if (!empty($Designation)){
            $DesignationID = $Designation->DesignationID;
            $sep = $sep->where('DesignationID',$DesignationID);
        }

        $sep = $sep->where('Status','Y')
            ->where('CreatedBy',$empcode)
            ->paginate(15);

        return new SEPAutomationCollection($sep);
    }
    public function store(SEPAutomationStoreRequest $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];


        $requestFile = $request->SepFile;
        if($requestFile) {
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
                $sep->SubmittedDate= $request->SubmittedDate ;
                $sep->Approval= $request->Approval ;
                $sep->HeadCount= $request->HeadCount ;
                $sep->DesignationID= $request->DesignationID ;
                $sep->SepFile= $fileNameToStore ;
                $sep->Status= $request->Status ;
                $sep->EmployeeType= $request->EmployeeType ;
                $sep->CreatedDate= Carbon::now() ;
                $sep->save() ;

                $sep= new SEPAutomationLog();
                $sep->CreatedBy= $empcode;
                $sep->DivisionID= $request->DivisionID ;
                $sep->DepartmentID= $request->DepartmentID ;
                $sep->PortfolioID= $request->PortfolioID ;
                $sep->SubmittedDate= $request->SubmittedDate ;
                $sep->Approval= $request->Approval ;
                $sep->HeadCount= $request->HeadCount ;
                $sep->DesignationID= $request->DesignationID ;
                $sep->Status= $request->Status ;
                $sep->EmployeeType= $request->EmployeeType ;
                $sep->SepFile= $fileNameToStore ;
                $sep->CreatedDate= Carbon::now() ;
                $sep->save();
                return response()->json([
                    'status' => 'success',
                    'message'=>'Successfully Stored'
                ]);
            } catch (\Exception $exception) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong! '.$exception->getMessage()
                ],500);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message'=>'Sep File field is required.'
            ]);
        }

    }

    public function update(SEPAutomationStoreRequest $request, $SEPID){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        try {
            $sep = SEPAutomation::where('SEPID', $SEPID)->first();
            $requestFile = $request->SepFile;
            if($request->has('SEPFile')){
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
            }else{
                $fileNameToStore = $sep->SepFile;
            }


            $sep->DivisionID= $request->DivisionID ;
            $sep->DepartmentID= $request->DepartmentID ;
            $sep->PortfolioID= $request->PortfolioID ;
            $sep->DesignationID= $request->DesignationID ;
            $sep->SepFile= $fileNameToStore ;
            $sep->SubmittedDate= $request->SubmittedDate ;
            $sep->Approval= $request->Approval ;
            $sep->HeadCount= $request->HeadCount ;
            $sep->EmployeeType= $request->EmployeeType ;
            $sep->EditDate= Carbon::now() ;
            $sep->Status= $request->Status ;
            $sep->EditBy= $empcode ;
            $sep->save();
            $sep= new SEPAutomationLog();
            $sep->DivisionID= $request->DivisionID ;
            $sep->DepartmentID= $request->DepartmentID ;
            $sep->PortfolioID= $request->PortfolioID ;
            $sep->SubmittedDate= $request->SubmittedDate ;
            $sep->Approval= $request->Approval ;
            $sep->HeadCount= $request->HeadCount ;
            $sep->DesignationID= $request->DesignationID ;
            $sep->SepFile= $fileNameToStore ;
            $sep->Status= $request->Status ;
            $sep->EmployeeType= $request->EmployeeType ;
            $sep->EditDate= Carbon::now() ;
            $sep->EditBy= $empcode ;
            $sep->CreatedBy= $empcode;
            $sep->CreatedDate= Carbon::now() ;
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

    public function allDesignation(){
        $designation= SEPDesignation::orderBy('DesignationID', 'desc')->get();
            return new DesignationCollection($designation);
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

    public function search($query)
    {

        $search =SEPAutomation::leftjoin('SEPPortfolio as p','p.PortfolioID', 'SEPAutomation.PortfolioID')
            ->leftjoin('SEPDepartment as d','d.DepartmentID','SEPAutomation.DepartmentID')
            ->leftjoin('SEPDesignation as deg','deg.DesignationID','SEPAutomation.DesignationID')
            ->where('SEPAutomation.DivisionID','LIKE',"%$query%")
            ->orwhere('p.PortfolioName','LIKE',"%$query%")
            ->orWhere('deg.DesignationName','LIKE',"%$query%")
            ->orWhere('d.DepartmentName','LIKE',"%$query%")
            ->paginate(15);
        return new SEPAutomationCollection($search);
    }

    public function exportSep(Request $request)
    {
        $query = $request->param;
        $exportsep= SEPAutomation::orwhere('DivisionID','LIKE',"%$query%")->orwhere('PortfolioID','LIKE',"%$query%")
            ->orWhere('DesignationID','LIKE',"%$query%")
            ->orWhere('DepartmentID','LIKE',"%$query%")
            ->get();
        return new ExportSEPAutomationCollection($exportsep);
    }


}

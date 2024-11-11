<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tax\TaxReturnStoreRequest;
use App\Models\TaxCertificate;
use App\Models\TaxCircle;
use App\Models\TaxZone;
use App\Models\TRA;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class TRAController extends Controller
{

    public function index(Request $request){

       $TaxYear =$request->TaxYear;
        try {

            $list = DB::table('Department as D')
                ->select('D.DeptCode','D.DeptName',DB::raw("COUNT(P.EmpCode) AS TotalEmployee ,
                COUNT(CASE WHEN A.EmpCode IS NOT NULL THEN 1 ELSE NULL END) Submitted,
	            COUNT(CASE WHEN A.EmpCode IS NULL THEN 1 ELSE NULL END) NotSubmitted "))
                ->join('Employer as E','E.DeptCode','=','D.DeptCode')
                ->join('Personal as P','P.EmpCode','=','E.EmpCode')
                ->leftJoin('TaxReturnAcknowledgement as A',function ($q) use($TaxYear){
                    $q->on('A.EmpCode','P.EmpCode');
                    $q->where('A.TaxYear',$TaxYear);
                })
                ->where('P.Active','=','Y')
                ->groupBy('D.DeptCode','D.DeptName')->paginate(15);


            return response()->json([
                'data'=>$list
            ]);

        }catch (\Exception $e) {

            return response()->json([
            'status' => 401,
            'message' => $e->getMessage()
            ]);
        }

    }

    public function taxableEmp($Year,$Dept,$Status){
        $list = DB::table('Employer as e')
            ->join('Personal as p ','p.EmpCode','=','e.EmpCode')
            ->join('Department as d ','d.DeptCode','=','e.DeptCode')
            ->join('Designation as dg ','dg.DesgCode','=','e.DesgCode')
            ->leftjoin('TaxReturnAcknowledgement as a ',function ($q) use ($Year){
                $q->on('a.EmpCode','e.EmpCode');
                $q->where('a.TaxYear',$Year);
            })
            ->leftjoin('TaxZone as tz ','tz.TaxZoneId','=','a.TaxZoneId')
            ->leftjoin('TaxCircle as tc ','tc.TaxCircleId','=','a.TaxCircleId')
            ->where('p.Active','Y')->where('e.DeptCode',$Dept);
        if ($Status ==='submitted'){
            $list->whereRaw("a.EmpCode is not null")
                ->select(DB::raw("CONCAT(e.EmpCode,': ',p.Name) as Employee"),'p.MobileNo','a.Etin', 'd.DeptName as Department','tz.TaxZoneName',
                    'tc.TaxCircleName', DB::raw("FORMAT(a.DateOfReturnSubmission, 'dd-MM-yyyy') AS DateOfReturnSubmission"), 'a.ReturnSerialNumber','a.TaxYear');


        }else{
            $list->whereRaw("a.EmpCode is null")
                ->select(DB::raw("CONCAT(e.EmpCode,': ',p.Name) as Employee"),'p.MobileNo' ,'p.PAddress as PermanentAddress','d.DeptName as Department','p.CAddress as CurrentAddress'
                   , DB::raw("FORMAT(e.JoiningDate, 'dd-MM-yyyy') AS JoiningDate"),'e.Location','dg.DesgName as Designation', 'a.TaxYear');
        }
        return response()->json([
           'data'=>$list ->orderBy('e.EmpCode','ASC')->paginate(10)
        ]);
    }

    public function getPeriods(){
     $list = TRA::select('TaxYear')->distinct()->get();
     return response()->json([
         'data'=>$list
     ]);
    }

   public function getTaxZone(){
       $zone = TaxZone::all();
       return response()->json([
          'data'=>$zone
       ]);
   }

   public function getTaxCircle(Request $request){
       $circle = TaxCircle::where('TaxZoneId',$request->id)->where('ActiveStatus','Y')->orderby('TaxCircleId','ASC')->get();
       return response()->json([
          'data'=>$circle
       ]);
   }

   public function getAcknowledgment(Request $request){
       $token = $request->bearerToken();
       $payload = JWTAuth::setToken($token)->getPayload();
       $EmpCode = $payload['EmpCode'];
       $data = TRA::where('EmpCode',$EmpCode)->where('TaxYear',$request->taxYear)->orderbydesc('TRAId')->first();
       return response()->json([
          'status'=>'Success',
          'data'=>$data,
       ]);
   }
   public function storeTaxReturn(Request $request){

        DB::beginTransaction();
       $validator = Validator::make($request->all(), [
           'Etin'=>'required|min:8',
           'Zone'=>'required',
           'Serial'=>'required',
           'ReturnDate'=>'required',
           'Circle'=>'required'
       ]);
       if ($validator->fails()) {
           return response()->json([
               'status' => 'error',
               'message' => $validator->errors()->first()]);
       }

        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $EmpCode = $payload['EmpCode'];
        $exist = TRA::query()->where('EmpCode',$EmpCode)->where('TaxYear',$request->TaxYear)->exists();
       try {
           if ($exist){
               $list = TRA::query()->where('EmpCode',$EmpCode)->where('TaxYear',$request->TaxYear)->first();
               $list->EditedIpAddress = $request->ip();
               $list->EditedDate = Carbon::now();


           }else{
               $list = new TRA();
               $list->EntryIpAddress = $request->ip();
               $list->EntryDate = Carbon::now();
           }
           $list->EmpCode = $EmpCode;
           $list->ETIN = $request->Etin;
           $list->TaxZoneId = $request->Zone;
           $list->TaxCircleId = $request->Circle;
           $list->DateOfReturnSubmission = $request->ReturnDate;
           $list->ReturnSerialNumber = $request->Serial;
           $list->TaxYear = $request->TaxYear;
           $list->save();
           DB::commit();
           return response()->json([
               'status'=>'Success',
               'message'=>'Submission Successful!'

           ]);
             }catch (\Exception $e) {
           DB::rollBack();
           return response()->json([
               'status' => 401,
               'message' => $e->getMessage()
           ]);
       }

}

}

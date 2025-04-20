<?php

namespace App\Http\Controllers;
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

        try {
            $TaxYear =$request->TaxYear;
            $Department = json_decode($request->Department);

            $list = DB::table('viewEmployeeInfo as D')
                ->select('D.DeptCode','D.DeptName',
                    DB::raw("COUNT(D.StaffID) AS TotalEmployee ,
                COUNT(CASE WHEN A.DateOfReturnSubmission IS NOT NULL THEN 1 ELSE NULL END) Submitted,
	            COUNT(CASE WHEN A.DateOfReturnSubmission IS NULL THEN 1 ELSE NULL END) NotSubmitted "))
//                ->join('Employer as E','E.DeptCode','=','D.DeptCode')
//                ->join('Personal as P','P.EmpCode','=','E.EmpCode')
                ->leftJoin('TaxReturnAcknowledgement as A',function ($q) use($TaxYear){
                    $q->on('D.StaffID','A.EmpCode');
                    $q->where('A.TaxYear',$TaxYear);
                });
            if (!empty($Department) && isset($Department)){
                $Department = collect($Department);
                $DeptCode= $Department->pluck('DeptCode');
                $list = $list->whereIn('D.DeptCode',$DeptCode);
            };
            $list->where('D.Active','=','Y')
                ->groupBy('D.DeptCode','D.DeptName');
            return response()->json([
                'data'=>$list->paginate(15)
            ]);

        }catch (\Exception $e) {

            return response()->json([
            'status' => 401,
            'message' => $e->getMessage()
            ]);
        }

    }
    public function taxableEmp($Year,$Dept,$Status){
        $list = DB::table('viewEmployeeInfo as e')
            ->join('Personal as p ','p.EmpCode','=','e.StaffID')
//            ->join('Department as d ','d.DeptCode','=','e.DeptCode')
//            ->join('Designation as dg ','dg.DesgCode','=','e.DesgCode')
            ->leftjoin('TaxReturnAcknowledgement as a ',function ($q) use ($Year){
                $q->on('a.EmpCode','e.StaffID');
                $q->where('a.TaxYear',$Year);
            })
            ->leftjoin('TaxZone as tz ','tz.TaxZoneId','=','a.TaxZoneId')
            ->leftjoin('TaxCircle as tc ','tc.TaxCircleId','=','a.TaxCircleId')
            ->where('p.Active','Y')->where('e.DeptCode',$Dept);
        if ($Status ==='submitted'){
            $list->whereRaw("a.DateOfReturnSubmission is not null")
                ->select(DB::raw("CONCAT(e.StaffID,': ',e.Name) as Employee"),'e.MobileNo','a.Etin', 'e.DeptName as Department',
                    'tz.TaxZoneName',
                    'tc.TaxCircleName', DB::raw("FORMAT(a.DateOfReturnSubmission, 'dd-MM-yyyy') AS DateOfReturnSubmission"),
                    'a.ReturnSerialNumber','a.TaxYear');


        }else{
            $list->whereRaw("a.DateOfReturnSubmission is null")
                ->select(DB::raw("CONCAT(e.StaffID,': ',e.Name) as Employee"),'e.MobileNo' ,'p.PAddress as PermanentAddress','e.DeptName as Department','p.CAddress as CurrentAddress'
                   , DB::raw("FORMAT(e.JoiningDate, 'dd-MM-yyyy') AS JoiningDate"),
//                    'e.Location',
                    'e.DesgName as Designation','a.TaxYear');
        }
//        dd($list->toSql());
        return response()->json([
           'data'=>$list ->orderBy('e.StaffID','ASC')->paginate(15)
        ]);
    }
    public function getPeriods(){
     $list = TRA::select('TaxYear')->distinct()->get();
     return response()->json([
         'data'=>$list
     ]);
    }
   public function getTaxZone(){
       $zone = TaxZone::where('Status','=',1)->get();
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
    public function getViewEmpData(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];

        $list = DB::table('ViewAllData as v')
            ->select('v.EmpCode','v.EmployeeName','v.DesgName','v.DeptName','v.MobileNo','t.TinNo','v.JoiningDate')
            ->leftJoin('TaxCertificate as t','t.empcode','=','v.EmpCode')
            ->where('v.EmpCode',$empcode)
            ->first();
        return $list;
    }

}

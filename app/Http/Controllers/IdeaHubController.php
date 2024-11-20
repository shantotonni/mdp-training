<?php

namespace App\Http\Controllers;

use App\Models\IdeaHub;
use App\Models\IdeaHubAttachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class IdeaHubController extends Controller
{
    public function index(Request $request){

        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];

        $idea = DB::table('MDPIdeaHub as I')->select('I.IdeaID as SL',DB::raw("Concat(I.EmpCode,': ',P.Name) as Name"),'I.Title',DB::raw("LEFT(I.Summary,50) AS Summary")  )
            ->join('Personal as P ','P.EmpCode','=','I.EmpCode')->where('I.EmpCode',$empcode) ->paginate(15);

        return response()->json([
            'data'=>$idea
        ]);

    }
    public function show($ID){

        $list = DB::table('MDPIdeaHub as h')
            ->where('h.IdeaID',$ID)->first();
        $attachment = IdeaHubAttachment::select('Attachment')->where('IdeaID',$ID)->get();
        $personal = DB::table('ViewAllData as v')
            ->select('v.EmpCode','v.EmployeeName','v.DesgName','v.DeptName')
            ->where('v.EmpCode',$list->EmpCode)
            ->first();
        return response()->json([
           'data'=>[
               'list'=>$list,
               'files'=>$attachment,
               'personal'=>$personal
           ]
        ]);
    }
   public function store(Request $request){
       try {
           DB::beginTransaction();
           $idea = new IdeaHub();
           $idea->EmpCode    = $request->EmpCode;
           $idea->Email      = $request->Email;
           $idea->Title      = $request->Title;
           $idea->Summary           = $request->Summary;
           $idea->CurrentIssue      = $request->CurrentIssue;
           $idea->ImpactOfTheIssue  = $request->ImpactOfTheIssue;
           $idea->SolutionOverView  = $request->SolutionOverView;
           $idea->Reason            = $request->Reason;
           $idea->CostSavings       = $request->CostSavings;
           $idea->Gains             = $request->Gains;
           $idea->Impact            = $request->Impact;
           $idea->Budget            = $request->Budget;
           $idea->Staffing          = $request->Staffing;
           $idea->Technology        = $request->Technology;
           $idea->CreatedAt         =   Carbon::now();
           if ($idea->save()){
               $requestFile = $request->Attachment;
               foreach ((array) $requestFile as $value){
                       $destination = public_path('file/Idea/');
                       list($type, $file) = explode(';', $value['content']);
                       list(, $extension) = explode('/', $type);
                       list(, $file) = explode(',', $file);
                       $fileNameToStore = time() . rand(1, 100000000) . '.' . $extension;

                       $source = fopen($value['content'], 'r');
                       $destination = fopen($destination . $fileNameToStore, 'w');
                       stream_copy_to_stream($source, $destination);
                       fclose($source);
                       fclose($destination);

                       $attachment              = new IdeaHubAttachment();
                       $attachment->IdeaID      = $idea->IdeaHubID;
                       $attachment->Attachment  = $fileNameToStore;
                       $attachment->save();
               }
           }
           DB::commit();
           return response()->json([
               'status' => 'Success',
               'message'=>'Idea Submitted Successfully!'
           ]);
       }catch (\Exception $exception) {
           DB::rollBack();
           return response()->json([
               'status' => 'error',
               'message' => $exception->getMessage()
           ], 500);
       }


   }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\MDPTrainigFeedbackCollection;
use App\Http\Resources\MDPTrainigFeedbackResource;
use App\Models\ManagementDevelopmentPlane;
use App\Models\MDPTraining;
use App\Models\MDPTrainingFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MDPTrainigFeedbackController extends Controller
{
    public function empCodeWiseTrainingList(Request $request){
        $len = strlen($request->empcode);
        if ($len == 4){
            $EmpCode = '0'.$request->empcode;
         }elseif ($len == 3){
            $EmpCode = '00'.$request->empcode;
        }else{
            $EmpCode = $request->empcode;
        }
        $mdp = ManagementDevelopmentPlane::where('StaffID',$EmpCode)->where('AppraisalPeriod',$request->AppraisalPeriod)->first();
        $training_list = MDPTraining::where('MDPID',$mdp->ID)->whereNotNull('TrainingTitle')->with('feedback','mdp')->get();
        return response()->json([
            'EmpInfo' => $mdp,
            'training_list' =>new MDPTrainigFeedbackCollection($training_list)
        ]);
    }

    public function store2nd(Request $request){
        $Data =         (object)$request->row_data;
        $Feedback =     $request->Feedback;
        foreach($Data as $row){
            $training = MDPTraining::query()->where('TrainingTitle',$row['TrainingTitle'])->first();
            $de = MDPTrainingFeedback::where('TrainingFeedbackID', $row['TrainingFeedbackID'])->first();
            $de->TrainingID = $training->ID;
            $de->StaffID = $row['EmpCode'];
            $de->Feedback = $Feedback;
            $de->LearningTransfer = $row['LearningTransfer'];
            $de->save();
        }
        return response()->json([
            'status'=>200,
            'message'=>'Feedback Submitted Successfully'
        ]);
    }

    public function store(Request $request){

        $data                   = (object)$request->row_data;
        $mdp                    = ManagementDevelopmentPlane::where('StaffID',$data->EmpCode)->where('AppraisalPeriod',$data->AppraisalPeriod)->first();
        $training_list          = MDPTraining::where('MDPID',$mdp->ID)->where('TrainingTitle',$data->TrainingTitle)->whereNotNull('TrainingTitle')->first();
        $MDPTrainingFeedback    = MDPTrainingFeedback::where('TrainingID',$training_list->ID)->first();

        if (!$MDPTrainingFeedback){
            $MDPTrainingFeedback = new MDPTrainingFeedback();
        }
        if ($data->Status == 'offered'){
            $DoneDate           = '';
            $Feedback           = '';
            $LearningTransfer   = '';
        }else{
            $DoneDate = date('Y-m-d',strtotime($data->DoneDate));
            $Feedback           = $data->Feedback;
            $LearningTransfer   = $data->LearningTransfer;
        }

        if ($data->OfferDateOne)
            $OfferDateOne       = date('Y-m-d',strtotime($data->OfferDateOne));
            else $OfferDateOne  = '';

        if ($data->OfferDateTwo)
            $OfferDateTwo  = date('Y-m-d',strtotime($data->OfferDateTwo));
        else $OfferDateTwo = '';

        if ($data->OfferDateThree)
            $OfferDateThree  = date('Y-m-d',strtotime($data->OfferDateThree));
        else $OfferDateThree = '';

        if ($data->OfferDateFour)
            $OfferDateFour  = date('Y-m-d',strtotime($data->OfferDateFour));
        else $OfferDateFour = '';

        if ($data->OfferDateFive)
            $OfferDateFive  = date('Y-m-d',strtotime($data->OfferDateFive));
        else $OfferDateFive = '';

        $MDPTrainingFeedback->TrainingID        = $training_list->ID;
        $MDPTrainingFeedback->Status            = $data->Status;
        $MDPTrainingFeedback->DoneDate          = $DoneDate;
        $MDPTrainingFeedback->Feedback          = $Feedback;
        $MDPTrainingFeedback->LearningTransfer  = $LearningTransfer;
        $MDPTrainingFeedback->OfferDateOne      = $OfferDateOne;
        $MDPTrainingFeedback->OfferDateTwo      = $OfferDateTwo;
        $MDPTrainingFeedback->OfferDateThree    = $OfferDateThree;
        $MDPTrainingFeedback->OfferDateFour     = $OfferDateFour;
        $MDPTrainingFeedback->OfferDateFive     = $OfferDateFive;
        $MDPTrainingFeedback->TrainerName       = $data->TrainerName;
        $MDPTrainingFeedback->StaffID           = $data->EmpCode;
        $MDPTrainingFeedback->save();
        return response()->json([
           'status'=>200,
           'message'=>'Feedback Submitted Successfully'
        ]);
    }

    public function additionalTrainingAddAndFeedback(Request $request){

        DB::beginTransaction();
        try {
            $mdp = ManagementDevelopmentPlane::where('StaffID',$request->EmpCode)->where('AppraisalPeriod',$request->AppraisalPeriod)->first();
            if ($mdp){
                $training_list = MDPTraining::query()->where('MDPID',$mdp->ID)->with('feedback')->whereNotNull('TrainingTitle');
                if (!empty($request->TrainingTitle)){
                    $training_list = $training_list->where('TrainingTitle',$request->TrainingTitle);
                }
                $training_list = $training_list->first();
            }else{
                $training_list = [];
            }

            if ($training_list){
                return response()->json([
                    'status' => 'exist',
                    'message' => 'Already Exist'
                ]);
            }else{

                if ($mdp){
                    $mdpID = $mdp->ID;
                }else{
                    $ManagementDevelopmentPlane = new ManagementDevelopmentPlane();
                    $ManagementDevelopmentPlane->AppraisalPeriod = $request->AppraisalPeriod;
                    $ManagementDevelopmentPlane->StaffID = $request->StaffID;
                    $ManagementDevelopmentPlane->EmployeeName = $request->EmployeeName;
                    $ManagementDevelopmentPlane->Designation = $request->Designation;
                    $ManagementDevelopmentPlane->Department = $request->Department;
                    $ManagementDevelopmentPlane->OfficialEmail = $request->OfficialEmail;
                    $ManagementDevelopmentPlane->Mobile = $request->Mobile;
                    $ManagementDevelopmentPlane->DateOfBirth = $request->DateOfBirth;
                    $ManagementDevelopmentPlane->JoiningDate = $request->JoiningDate;
                    $ManagementDevelopmentPlane->CurrentPosition = $request->CurrentPosition;
                    $ManagementDevelopmentPlane->PresentJobStartedOn = $request->PresentJobStartedOn;
                    $ManagementDevelopmentPlane->Qualification = $request->Qualification;
                    $ManagementDevelopmentPlane->save();

                    $mdpID = $ManagementDevelopmentPlane->ID;
                }

                $training = new MDPTraining();
                $training->MDPID = $mdpID;
                $training->TrainingTitle = $request->TrainingTitle;
                $training->TrainingType = $request->TrainingType;
                $training->TrainingTypeStatus = 'additional';
                if ($training->save()){
                    if ($request->Status == 'offered'){
                        $DoneDate = '';
                    }else{
                        $DoneDate = date('Y-m-d',strtotime($request->DoneDate));
                    }

                    if ($request->OfferDateOne)
                        $OfferDateOne = date('Y-m-d',strtotime($request->OfferDateOne));
                    else $OfferDateOne = '';

                    if ($request->OfferDateTwo)
                        $OfferDateTwo = date('Y-m-d',strtotime($request->OfferDateTwo));
                    else $OfferDateTwo = '';

                    if ($request->OfferDateThree)
                        $OfferDateThree = date('Y-m-d',strtotime($request->OfferDateThree));
                    else $OfferDateThree = '';

                    if ($request->OfferDateFour)
                        $OfferDateFour = date('Y-m-d',strtotime($request->OfferDateFour));
                    else $OfferDateFour = '';

                    if ($request->OfferDateFive)
                        $OfferDateFive = date('Y-m-d',strtotime($request->OfferDateFive));
                    else $OfferDateFive = '';

                    $MDPTrainingFeedback = new MDPTrainingFeedback();
                    $MDPTrainingFeedback->TrainingID = $training->ID;
                    $MDPTrainingFeedback->Status = $request->Status;
                    $MDPTrainingFeedback->DoneDate = $DoneDate;
                    $MDPTrainingFeedback->OfferDateOne = $OfferDateOne;
                    $MDPTrainingFeedback->OfferDateTwo = $OfferDateTwo;
                    $MDPTrainingFeedback->OfferDateThree = $OfferDateThree;
                    $MDPTrainingFeedback->OfferDateFour = $OfferDateFour;
                    $MDPTrainingFeedback->OfferDateFive = $OfferDateFive;
                    $MDPTrainingFeedback->save();

                    DB::commit();

                    return response()->json([
                        'status'=>200,
                        'message'=>'Feedback Submitted Successfully'
                    ]);
                }
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function getEmployeeInfo(Request $request){
        $len = strlen($request->EmpCode);
        if ($len == 4){
            $EmpCode = '0'.$request->EmpCode;
        }elseif ($len == 3){
            $EmpCode = '00'.$request->EmpCode;
        }else{
            $EmpCode = $request->EmpCode;
        }

        $mdp = ManagementDevelopmentPlane::where('StaffID',$EmpCode)->where('AppraisalPeriod',$request->AppraisalPeriod)->first();
        if ($mdp){
            return response()->json([
                'status' => 'success',
                'message' => 'Yes! You have filled out MDP Form',
                'EmpInfo' => $mdp,
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'You havent filled out yet MDP Form',
                'EmpInfo' => [],
            ]);
        }

    }

    public function getDateWiseTitle(Request $request){
        $TrainingDate = $request->TrainingDate;
        $AppraisalPeriod = $request->AppraisalPeriod;

        $individual_training = DB::select("
             SELECT 
                DISTINCT MM.TrainingTitle
            FROM MDPTrainingFeedback M
                INNER JOIN MDPTraining MM
                    ON M.TrainingID = MM.ID
                INNER JOIN ManagementDevelopmentPlane MMM
                    ON MMM.ID = MM.MDPID
            WHERE DoneDate = '$TrainingDate'
            and MMM.AppraisalPeriod = '$AppraisalPeriod'
        ");
        return response()->json([
           'training_title' => $individual_training
        ]);

    }

    public function getDateWiseTrainingWiseList(Request $request){
        $TrainingDate = $request->TrainingDate;
        $AppraisalPeriod = $request->AppraisalPeriod;

        $TrainingTitle = $request->TrainingTitle;
        $TrainingTitle = collect($TrainingTitle);
        $TrainingTitle = $TrainingTitle->pluck('TrainingTitle');
        $TrainingTitle = $TrainingTitle->toArray();
        $TrainingTitle = implode("','",$TrainingTitle);
        $TrainingTitle = "'".$TrainingTitle."'";

        $individual_training = DB::select("exec TrainingFeedbackList $TrainingTitle,'$AppraisalPeriod','$TrainingDate'");
        return response()->json([
           'training_list' => $individual_training
        ]);
    }
}

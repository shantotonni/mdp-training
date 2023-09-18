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
        return new MDPTrainigFeedbackCollection($training_list);
    }

//    public function empCodeWiseSingleTrainingList(Request $request){
//        $len = strlen($request->empcode);
//        if ($len == 4){
//            $EmpCode = '0'.$request->empcode;
//        }elseif ($len == 3){
//            $EmpCode = '00'.$request->empcode;
//        }else{
//            $EmpCode = $request->empcode;
//        }
//
//        $mdp = ManagementDevelopmentPlane::where('StaffID',$EmpCode)->where('AppraisalPeriod',$request->AppraisalPeriod)->first();
//        $training_list = MDPTraining::where('MDPID',$mdp->ID)->where('TrainingTitle',$request->TrainingTitle)->with('feedback')->whereNotNull('TrainingTitle')->first();
//        return new MDPTrainigFeedbackResource($training_list);
//    }

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
        $MDPTrainingFeedback->save();
        return response()->json([
           'status'=>200,
           'message'=>'Feedback Submitted Successfully'
        ]);
    }

    public function additionalTrainingAddAndFeedback(Request $request){

        DB::beginTransaction();
        try {
            $mdp = ManagementDevelopmentPlane::where('StaffID',$request->empcode)->where('AppraisalPeriod',$request->AppraisalPeriod)->first();
            $training_list = MDPTraining::query()->where('MDPID',$mdp->ID)->with('feedback')->whereNotNull('TrainingTitle');
            if (!empty($request->TrainingTitle)){
                $training_list = $training_list->where('TrainingTitle',$request->TrainingTitle);
            }
            $training_list = $training_list->first();

            if ($training_list){
                return response()->json([
                    'status' => 'exist',
                    'message' => 'Already Exist'
                ]);
            }else{
                $training = new MDPTraining();
                $training->MDPID = $mdp->ID;
                $training->TrainingTitle = $request->TrainingTitle;
                $training->TrainingType = $request->TrainingType;
                $training->TrainingDate = $request->TrainingDate;
                $training->TrainingTypeStatus = 'additional';
                if ($training->save()){
                    if ($request->Status == 'offered'){
                        $DoneDate = '';
                        $Feedback = '';
                        $LearningTransfer = '';
                    }else{
                        $DoneDate = date('Y-m-d',strtotime($request->DoneDate));
                        $Feedback = $request->Feedback;
                        $LearningTransfer = $request->LearningTransfer;
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
                    $MDPTrainingFeedback->Feedback = $Feedback;
                    $MDPTrainingFeedback->LearningTransfer = $LearningTransfer;
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
}

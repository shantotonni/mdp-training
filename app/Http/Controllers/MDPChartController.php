<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MDPChartController extends Controller
{
    public function getOrganizedPendingPTC($Period){
        $sql = "SELECT MDPF.Status,
                  CASE
                    WHEN MDPF.Status='done' THEN COUNT(MDPF.Status)
                    ELSE COUNT(MDPF.Status)
                  END as PTC
                  FROM MDPTraining AS MDPT
                    JOIN ManagementDevelopmentPlane  AS MDP
                  ON MDP.ID = MDPT.MDPID
                    JOIN MDPTrainingFeedback AS MDPF
                  ON MDPF.TrainingID = MDPT.ID
                  WHERE 
                        MDPT.TrainingTitle is not null 
                        AND MDPF.Status is not null 
                        AND MDP.AppraisalPeriod = '$Period'
                 GROUP BY MDPF.Status";
        $ptc = DB::select($sql);
        $newPtc = [];
        $newPtc [] = [
            'Organized' => $ptc[0]->PTC,
            'Pending' => $ptc[1]->PTC,
        ];

        $sql2 = "SELECT COUNT(MDPF.TrainingID) as Total
                  FROM MDPTraining AS MDPT
                    JOIN ManagementDevelopmentPlane  AS MDP
                  ON MDP.ID = MDPT.MDPID
                    JOIN MDPTrainingFeedback AS MDPF
                  ON MDPF.TrainingID = MDPT.ID
                  WHERE 
                        MDPT.TrainingTitle is not null 
                        AND MDPF.Status is not null 
                        AND MDP.AppraisalPeriod = '$Period'";
        $total = DB::select($sql2);
        return response()->json([
           'ptc' => $newPtc ,
           'total' => $total
        ]);
    }

    public function getOrganizedPendingPTCDetails($Period, $Status){
        if ($Status == 'Pending'){
            $d = 'offered';
        }else{
            $d = 'done';
        }

        $sql = "SELECT MDPT.TrainingTitle,COUNT(MDPF.Status) as Total
                  FROM MDPTraining AS MDPT
                    JOIN ManagementDevelopmentPlane AS MDP
                  ON MDP.ID = MDPT.MDPID
                    JOIN MDPTrainingFeedback AS MDPF
                  ON MDPF.TrainingID = MDPT.ID
                  WHERE 
                        MDPT.TrainingTitle IS NOT NULL 
                        AND MDPF.Status IS NOT NULL AND MDPF.Status='$d'
                        AND MDP.AppraisalPeriod = '$Period'
                  GROUP BY MDPT.TrainingTitle,MDPF.Status";
        $ptc = DB::select($sql);

        return response()->json([
           'ptc' => $ptc ,
        ]);
    }

    public function getOrganizedPendingPTCTitleWiseEmployee(Request $request){
        $Period = $request->data['Period'];
        $Status = $request->data['Status'];
        $Title = $request->data['Title'];

        if ($Status == 'Pending'){
            $d = 'offered';
        }else{
            $d = 'done';
        }
        $sql = "SELECT MDPT.TrainingTitle,MDP.StaffID,MDP.EmployeeName,MDPF.Status
                  FROM MDPTraining AS MDPT
                    JOIN ManagementDevelopmentPlane AS MDP
                  ON MDP.ID = MDPT.MDPID
                    JOIN MDPTrainingFeedback AS MDPF
                  ON MDPF.TrainingID = MDPT.ID
                  WHERE 
                MDPT.TrainingTitle IS NOT NULL 
                AND MDPF.Status IS NOT NULL AND MDPF.Status='$d' and MDPT.TrainingTitle='$Title'
                AND MDP.AppraisalPeriod = '$Period'";
        $ptc = DB::select($sql);

        return response()->json([
           'ptc' => $ptc ,
        ]);
    }
    public function MDPPeriodWiseTraining($Period){
        $list = DB::select("select MDPF.TrainingID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType,MDPF.LearningTransfer,SUM(MDPF.LearningTransfer) / COUNT(MDPF.TrainingID) as AVGLEarningTransfer
                         from MDPTrainingFeedback MDPF
                            join MDPTraining as MDPT 
                                on MDPF.TrainingID = MDPT.ID
                            join ManagementDevelopmentPlane MDP
                                on MDP.ID = MDPT.MDPID
                         where LearningTransfer is not null 
                            and MDP.AppraisalPeriod = '$Period'	
                            and LearningTransfer > 0
                         group by MDPF.TrainingID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType,MDPF.LearningTransfer");
        return response()->json([
           'data'=>$list
        ]);
    }

    public function MDPLearningTransferDetails($Period,$TrainingID){
        $list = DB::select("select MDP.EmployeeName,MDP.StaffID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType, MDPF.LearningTransfer from MDPTrainingFeedback MDPF
                     join MDPTraining as MDPT 
                            on MDPF.TrainingID = MDPT.ID
                        join ManagementDevelopmentPlane MDP
                            on MDP.ID = MDPT.MDPID
                     where  LearningTransfer is not null and LearningTransfer > 0
                        and MDP.AppraisalPeriod = '$Period'	
                        and MDPF.TrainingID='$TrainingID'");
        return response()->json([
            'data'=>$list
        ]);
    }


    public function MDPPeriodWiseFeedback($Period){

        $list = DB::select("select MDPF.TrainingID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType,SUM(MDPF.Feedback) / COUNT(MDPF.TrainingID) as Feedback
                     from MDPTrainingFeedback MDPF
                        join MDPTraining as MDPT 
                            on MDPF.TrainingID = MDPT.ID
                        join ManagementDevelopmentPlane MDP
                            on MDP.ID = MDPT.MDPID
                     where Feedback is not null 
                        and MDP.AppraisalPeriod = '$Period'	
                        and Feedback > 0
                     group by MDPF.TrainingID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType,MDPF.Feedback");
        return response()->json([
           'data'=>$list
        ]);
    }

    public function MDPPeriodWiseFeedbackDetails($Period, $TrainingID){

        $list = DB::select("select MDP.EmployeeName,MDP.StaffID,MDP.AppraisalPeriod, MDPT.TrainingTitle,MDPT.TrainingDate, MDPT.TrainingType, MDPF.Feedback from MDPTrainingFeedback MDPF
                     join MDPTraining as MDPT 
                            on MDPF.TrainingID = MDPT.ID
                        join ManagementDevelopmentPlane MDP
                            on MDP.ID = MDPT.MDPID
                     where Feedback is not null and Feedback > 0
                        and MDP.AppraisalPeriod = '$Period'	
                        and MDPF.TrainingID='$TrainingID'");
        return response()->json([
            'data'=>$list
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MDPChartController extends Controller
{
    public function getAllChartReport(){
        $training_list = DB::select("exec SP_doLoadAllChartReport");
//        $format = [];
//        foreach ($training_list as $item){
//            $format[] = [
//                $item->AppraisalPeriod => $item->Total
//            ];
//        }
        return response()->json([
           'training_count' =>  $training_list
        ]);
    }

    public function getOrganizedPendingPTC($Period){
        $sql = "SP_doLoadOrganizedPendingPTC '$Period' ";
        $ptc = DB::select($sql);
        $newPtc = [];

        $newPtc [] = [
            'Organized' => $ptc[0]->Organized,
            'Pending' => $ptc[0]->Pending,
        ];
        return response()->json([
           'ptc' => $newPtc ,
           'total' => $ptc[0]->TotalTraining
        ]);
    }

    public function getOrganizedPendingPTCDetails($Period, $Status){
        if ($Status == 'Pending'){
            $sql = "exec SP_doLoadPendingTrainingList '$Period'";
        }else{
            $sql = "exec SP_doLoadDoneTrainingList '$Period'";
        }
        $ptc = DB::select($sql);

        return response()->json([
           'ptc' => $ptc ,
        ]);
    }

    public function getPendingPTCReport(Request $request){
        $Period = $request->Period;
        $CurrentPage = $request->pagination['current_page'];
        $PerPage = 20;
        $Export = $request->Export;
        if ($Export == 'Y'){
            $CurrentPage = '%';
        }

        $sql = "exec SP_doLoadPendingPTCReport '$Period','$PerPage','$CurrentPage','' ";

        $conn = DB::connection('sqlsrv');
        $pdo = $conn->getPdo()->prepare($sql);
        $pdo->execute();
        $res = array();
        do {
            $rows = $pdo->fetchAll(\PDO::FETCH_ASSOC);
            $res[] = $rows;
        } while ($pdo->nextRowset());

        $NUmberOfRecord = $res[1][0]['NUmberOfRecord'];
        $pages_count = ceil($NUmberOfRecord / $PerPage);
        $last_page  = $pages_count;
        $from = 1;
        $to = 20;
        if ($Export != 'Y'){
            $from = (($CurrentPage * $PerPage) + 1) - $PerPage;
            $to = ($CurrentPage * $PerPage);
        }

        $paginationData [] = [
            'current_page' => $CurrentPage,
            'last_page' => $last_page,
            'total' => (int)$NUmberOfRecord,
            'from' => $from,
            'to' => $to,
        ];

        return response()->json([
            'data' => $res[0],
            'paginationData' => $paginationData
        ]);
    }

    public function getApprovedPTCReport(Request $request){
        $Period = $request->Period;
        $CurrentPage = $request->pagination['current_page'];
        $PerPage = 20;
        $Export = $request->Export;
        if ($Export == 'Y'){
            $CurrentPage = '%';
        }

        $sql = "exec SP_doLoadDonePTCReport '$Period','$PerPage','$CurrentPage','' ";

        $conn = DB::connection('sqlsrv');
        $pdo = $conn->getPdo()->prepare($sql);
        $pdo->execute();
        $res = array();
        do {
            $rows = $pdo->fetchAll(\PDO::FETCH_ASSOC);
            $res[] = $rows;
        } while ($pdo->nextRowset());

        $NUmberOfRecord = $res[1][0]['NUmberOfRecord'];
        $pages_count = ceil($NUmberOfRecord / $PerPage);
        $last_page  = $pages_count;
        $from = 1;
        $to = 20;
        if ($Export != 'Y'){
            $from = (($CurrentPage * $PerPage) + 1) - $PerPage;
            $to = ($CurrentPage * $PerPage);
        }

        $paginationData [] = [
            'current_page' => $CurrentPage,
            'last_page' => $last_page,
            'total' => (int)$NUmberOfRecord,
            'from' => $from,
            'to' => $to,
        ];

        return response()->json([
            'data' => $res[0],
            'paginationData' => $paginationData
        ]);
    }

    public function mdpTotalReport(Request $request){
        $Period = $request->Period;
        $EmpCode = $request->EmpCode;
        $TrainingTypeStatus = $request->TrainingTypeStatus;
        $CurrentPage = $request->pagination['current_page'];
        $PerPage = 20;
        $Export = $request->Export;
        if ($Export == 'Y'){
            $CurrentPage = '%';
        }

        $sql = "exec SP_doLoadMDPTotalReportNew '$Period','$EmpCode','$TrainingTypeStatus','$PerPage','$CurrentPage','' ";

        $conn = DB::connection('sqlsrv');
        $pdo = $conn->getPdo()->prepare($sql);
        $pdo->execute();
        $res = array();
        do {
            $rows = $pdo->fetchAll(\PDO::FETCH_ASSOC);
            $res[] = $rows;
        } while ($pdo->nextRowset());

        $NUmberOfRecord = $res[1][0]['NUmberOfRecord'];
        $pages_count = ceil($NUmberOfRecord / $PerPage);
        $last_page  = $pages_count;
        $from = 1;
        $to = 20;
        if ($Export != 'Y'){
            $from = (($CurrentPage * $PerPage) + 1) - $PerPage;
            $to = ($CurrentPage * $PerPage);
        }

        $paginationData [] = [
            'current_page' => $CurrentPage,
            'last_page' => $last_page,
            'total' => (int)$NUmberOfRecord,
            'from' => $from,
            'to' => $to,
        ];

        return response()->json([
            'data' => $res[0],
            'paginationData' => $paginationData
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
        $list = DB::select("select MDP.AppraisalPeriod, MDPT.TrainingTitle,SUM(MDPF.LearningTransfer) / COUNT(MDPF.TrainingID) as AVGLEarningTransfer, COUNT(MDPT.TrainingTitle) as Total
            from MDPTrainingFeedback MDPF
            join MDPTraining as MDPT 
                on MDPF.TrainingID = MDPT.ID
            join ManagementDevelopmentPlane MDP
                on MDP.ID = MDPT.MDPID
            where LearningTransfer is not null 
            and MDP.AppraisalPeriod = '2023-2024'	
            and LearningTransfer >= 0
            group by MDP.AppraisalPeriod, MDPT.TrainingTitle");
        return response()->json([
           'data'=>$list
        ]);
    }

    public function MDPLearningTransferDetails($Period,$TrainingTitle){
        $list = DB::select("select MDP.AppraisalPeriod, MDPT.TrainingTitle, MDPT.ID,MDPT.MDPID, MDPT.TrainingType, MDPT.TrainingDate, MDPT.TrainingTypeStatus,
            MDPF.TrainingFeedbackID, MDP.StaffID,MDP.EmployeeName,D.DesgName,MDP.Department, MDPF.Status, MDPF.DoneDate, MDPF.OfferDateOne,
             MDPF.OfferDateTwo,MDPF.OfferDateThree,MDPF.Feedback,MDPF.LearningTransfer,MDPF.TrainerName
            from MDPTrainingFeedback MDPF
            join MDPTraining as MDPT 
                on MDPF.TrainingID = MDPT.ID
            join ManagementDevelopmentPlane MDP
                on MDP.ID = MDPT.MDPID
            INNER JOIN Employer E
                ON MDP.StaffID = E.EmpCode 
            INNER JOIN Designation D
                ON E.DesgCode= D.DesgCode
            where LearningTransfer is not null 
            and MDP.AppraisalPeriod = '$Period'	
            and LearningTransfer >= 0
            and MDPT.TrainingTitle = '$TrainingTitle'");
        return response()->json([
            'data'=>$list
        ]);
    }

    public function MDPPeriodWiseFeedback($Period){

        $list = DB::select("select MDP.AppraisalPeriod, MDPT.TrainingTitle,SUM(MDPF.Feedback) / COUNT(MDPF.TrainingID) as Feedback, COUNT(MDPT.TrainingTitle) as Total
                    from MDPTrainingFeedback MDPF
                    join MDPTraining as MDPT 
                        on MDPF.TrainingID = MDPT.ID
                    join ManagementDevelopmentPlane MDP
                        on MDP.ID = MDPT.MDPID
                    where Feedback is not null 
                    and MDP.AppraisalPeriod = '$Period'	
                    and Feedback >= 0
                    group by MDP.AppraisalPeriod, MDPT.TrainingTitle");
        return response()->json([
           'data'=>$list
        ]);
    }

    public function MDPPeriodWiseFeedbackDetails($Period, $TrainingTitle){

        $list = DB::select("select MDP.AppraisalPeriod,MDPT.TrainingTitle, MDPT.ID,MDPT.MDPID, MDPT.TrainingType, MDPT.TrainingDate, MDPT.TrainingTypeStatus,
            MDPF.TrainingFeedbackID, MDP.StaffID,MDP.EmployeeName,D.DesgName,MDP.Department, MDPF.Status, MDPF.DoneDate, MDPF.OfferDateOne,
             MDPF.OfferDateTwo,MDPF.OfferDateThree,MDPF.Feedback,MDPF.LearningTransfer,MDPF.TrainerName
            from MDPTrainingFeedback MDPF
            join MDPTraining as MDPT 
                on MDPF.TrainingID = MDPT.ID
            join ManagementDevelopmentPlane MDP
                on MDP.ID = MDPT.MDPID
            INNER JOIN Employer E
                ON MDP.StaffID = E.EmpCode 
            INNER JOIN Designation D
                ON E.DesgCode= D.DesgCode
            where Feedback is not null 
            and MDP.AppraisalPeriod = '$Period'	
            and Feedback >= 0
            and MDPT.TrainingTitle = '$TrainingTitle'");
        return response()->json([
            'data'=>$list
        ]);
    }


}

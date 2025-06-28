<?php

namespace App\Http\Resources\Export;

use App\Models\NewMDPEmployeeTrainingList;
use App\Models\TrainingName;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExportManagementDevelopmentPlaneDetailsCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];


        return [
            'data'=>$this->collection->transform(function ($mdp) use($empcode){
                $areaOneTitle = TrainingName::select('TrnName')->where('TrnCode','=', $mdp->AreaOne)->first();

                $areaTwoTitle = TrainingName::select('TrnName')->where('TrnCode', '=',$mdp->AreaTwo)->first();
                if ($mdp->SuppervisorStaffID == $empcode){
                    $superVisor  = 'Y';
                }else{
                    $superVisor  = 'N';
                }
                $i=0;
                $array =  [
                    'ID'=>  $mdp->ID,

                    'SubmittedDateAndTime'         => date('m/d/Y h:i:s A', strtotime($mdp->CreatedDate)) ,
                    'AppraisalPeriod'              => $mdp->AppraisalPeriod,
                    'StaffID'                       => $mdp->StaffID,
                    'EmployeeName'      => $mdp->EmployeeName,
                    'Designation'       => $mdp->Designation,
                    'Department'        => $mdp->Department,
                    'Business'          => $mdp->Business,
                    'OfficialEmail'     => $mdp->OfficialEmail,
//                    'Contact Number'    => $mdp->Mobile,
                    'Mobile'            => $mdp->Mobile,
                    'DateOfBirth'       =>  date("m/d/Y ", strtotime($mdp->DateOfBirth)),
                    'JoiningDate'       =>  date("m/d/Y ", strtotime($mdp->JoiningDate)),
                    'CurrentPosition'   => $mdp->CurrentPosition,
                    'PresentJobStartedOn'   =>  date("m/d/Y ", strtotime($mdp->PresentJobStartedOn)),
                    'Qualification'    => $mdp->Qualification,
                    'SupervisorStaffID'    => $mdp->SuppervisorStaffID,
                    'SupervisorName'       => $mdp->SuppervisorName,
                    'SupervisorDesignation'   => $mdp->SuppervisorDesignation,
                    'SupervisorEmail'   => $mdp->SuppervisorEmail,
                    'SupervisorMobile'   => $mdp->SuppervisorMobile,
                    'MDPStatus'         => $mdp->MDPStatus,

                ];

                $count = 0;
                foreach ($mdp->initiative as $row){
                    $count++;
                    $array['PersonalTrainingTitle' .'-'. $count]     = isset($row['Name'])?$row['Name']:'';
                    $array['PersonalCompetencyType' .'-'. $count]    = isset($row['Type'])?$row['Type']:'';
                    $array['PersonalPlannedDate' .'-'. $count]      =isset($row['Date'])?date("m/d/Y ", strtotime($row['Date'])):'';
                }
                $countRe = 0;
                foreach ($mdp->training as $row){
                    $countRe++;
                    $array['RequiredTrainingTitle' .'-'.$countRe]     = isset($row['TrainingTitle'])?$row['TrainingTitle']:'';
                    $array['RequiredCompetencyType' .'-'. $countRe]   = isset($row['TrainingType'])?$row['TrainingType']:'';
                    $array['RequiredPlannedDate' .'-'. $countRe]      = isset($row['TrainingDate'])?date("m/d/y",strtotime($row['TrainingDate'])):'';
                }

                $array['FutureTrainingTitle-1'] = $areaOneTitle?$areaOneTitle->TrnName: $mdp->AreaOne;
                $array[' FutureTrainingDetails-1']   = $mdp->FutureTrainingOneDetails;


                $array['FutureTrainingTitle-2 '] = $areaTwoTitle?$areaTwoTitle->TrnName: $mdp->AreaTwo;
                $array['FutureTrainingDetails-2']   = $mdp->FutureTrainingTwoDetails ?? ''; // use null coalescing if it might not exist


                return $array;


            })
        ];
    }
}

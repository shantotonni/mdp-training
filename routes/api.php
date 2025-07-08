<?php

use App\Http\Controllers\ActionPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\IdeaHubController;
use App\Http\Controllers\JobDescriptionController;
use App\Http\Controllers\MDPChartController;
use App\Http\Controllers\MDPController;
use App\Http\Controllers\MDPTrainigFeedbackController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SEPAutomationController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TRAController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\CommonController;
use App\Http\Controllers\RecruitmentController;

Route::post('login', [AuthController::class, 'login']);

//Recruitment Requisition
Route::get('get-all-departments', [RecruitmentController::class, 'allDepartment']);
Route::post('store-recruitment-requisition', [RecruitmentController::class, 'storeRecruitmentRequisition']);

Route::group(['middleware' => 'jwt','throttle:10000,1'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group(['middleware' => ['jwt','throttle:10000,1']], function () {

    Route::group(['prefix' => 'report'],function () {
        // Route::get('student-payment',[ReportController::class,'studentPayment']);
        // Route::get('export-student-payment-report',[ReportController::class,'studentPaymentReport']);
    });

    // ADMIN USERS
    Route::apiResource('users',UserController::class);
    Route::get('search/users/{query}', [UserController::class,'search']);

    //mdp route
    Route::group(['prefix' => 'mdp'],function () {
        Route::get('list',[MDPController::class,'index']);
        Route::post('store',[MDPController::class,'store']);
        Route::get('edit/{ID}/{YEAR}', [MDPController::class,'edit']);
        Route::post('update', [MDPController::class,'update']);
        Route::post('all-mdp-print', [MDPController::class,'allMDPPrint']);
        Route::get('print/{ID}', [MDPController::class,'print']);
        Route::get('search/list/{query}', [MDPController::class,'search']);
        Route::delete('delete/{ID}', [MDPController::class,'delete']);
        Route::get('approved-mdp', [MDPController::class,'approvedMDP']);

        Route::get('export-mdp-list', [MDPController::class,'mdpExport']);
        Route::get('export-mdp-details-list', [MDPController::class,'mdpDetailsExport']);
        //bnaglaexport
        Route::get('get-export-training-history', [MDPController::class,'getExportTrainingHistory']);

        Route::get('get-top-ranked-training', [MDPController::class,'getTopRankedTraining']);
        Route::get('get-all-mdp-business', [MDPController::class,'getAllMDPBusiness']);
        Route::get('get-all-mdp-department', [MDPController::class,'getAllMDPDepartment']);
        Route::get('get-all-mdp-employee', [MDPController::class,'getAllMDPEmployee']);
        Route::get('get-all-training-title', [MDPController::class,'getAllTrainingTitle']);
        Route::post('get-employee-wise-report', [MDPController::class,'getEmployeeWiseReport']);
        //individual tarining
        Route::get('get-employee-individual-training', [MDPController::class,'getEmployeeIndividualTraining']);

    });


    //Route::get('mdp/edit/{ID}', [MDPController::class,'edit']);
    Route::get('get-new-training', [MDPController::class,'getNewTrainingOfferedList2025']);
    Route::post('get-employee-by-employee-code', [MDPController::class,'getEmployeeByEmployeeCode']);
    Route::post('get-supervisor-by-employee-code', [MDPController::class,'getSupervisorByEmployeeCode']);
    Route::get('get-level-wise-suggestive-list/{StaffID}', [MDPController::class,'getLevelWiseSuggestiveList']);

    Route::get('export-mdp-feedback', [MDPController::class,'mdpFeedbackExport']);






    //feedback
    Route::get('empcode-wise-training-list', [MDPTrainigFeedbackController::class,'empCodeWiseTrainingList']);
    Route::get('empcode-wise-single-training-list', [MDPTrainigFeedbackController::class,'empCodeWiseSingleTrainingList']);
    Route::post('training-feedback-submit', [MDPTrainigFeedbackController::class,'store']);
    Route::post('training-feedback-submit-2nd', [MDPTrainigFeedbackController::class,'store2nd']);
    Route::post('additional-training-feedback-submit', [MDPTrainigFeedbackController::class,'additionalTrainingAddAndFeedback']);
    Route::get('get-employee-info', [MDPTrainigFeedbackController::class,'getEmployeeInfo']);
    Route::get('load-date-wise-title', [MDPTrainigFeedbackController::class,'getDateWiseTitle']);
    Route::post('load-date-wise-training-wise-list', [MDPTrainigFeedbackController::class, 'getDateWiseTrainingWiseList']);
    //End

    //Action Plan Route
    Route::get('action-plane/list',[ActionPlanController::class,'index']);
    Route::post('hr_action_plane_store',[ActionPlanController::class,'store']);
    Route::get('action-plane-edit/{ID}', [ActionPlanController::class,'edit']);
    Route::post('action_plane_update', [ActionPlanController::class,'update']);
    Route::get('action_plane_print/{ID}', [ActionPlanController::class,'print']);
    Route::get('action_plane_search/{query}', [ActionPlanController::class,'search']);
    Route::delete('action_plane_delete/{ID}', [ActionPlanController::class,'delete']);
    Route::get('get-all-division', [ActionPlanController::class,'getAllDivision']);
    Route::post('get-all-department', [ActionPlanController::class,'getAllDepartment']);

    Route::post('action-plan/get-employee-by-employee-code', [ActionPlanController::class,'getEmployeeByEmployeeCode']);
    Route::post('action-plan/get-supervisor-by-employee-code', [ActionPlanController::class,'getSupervisorByEmployeeCode']);

    //Export
    Route::post('export-action-plane-list',[ActionPlanController::class,'exportActionPlan']);
    Route::post('export-sep-list',[SEPAutomationController::class,'exportSep']);

    //End

//SEP Automation
    Route::apiResource('sep-automation',SEPAutomationController::class);
    Route::get('search/sep-automation/{query}', [SEPAutomationController::class,'search']);

    Route::apiResource('sep-department',DepartmentController::class);
    Route::get('search/sep-department/{query}', [DepartmentController::class,'search']);
    Route::get('all-portfolio', [DepartmentController::class,'allPortfolio']);

    Route::apiResource('sep-designation',DesignationController::class);
    Route::get('search/sep-designation/{query}', [DesignationController::class,'search']);
    Route::get('all-department', [DesignationController::class,'allDepartment']);

    Route::apiResource('sep-portfolio',PortfolioController::class);
    Route::get('search/sep-portfolio/{query}', [PortfolioController::class,'search']);

    Route::get('all-division', [SEPAutomationController::class,'allDivision']);
    Route::post('all-portfolio-by-division', [SEPAutomationController::class,'allPortfolio']);
    Route::get('all-designation', [SEPAutomationController::class,'allDesignation']);

    //job description
    Route::get('job-description/list',[JobDescriptionController::class,'index']);
    Route::post('job-description-store',[JobDescriptionController::class,'store']);
    Route::get('job-description-edit/{ID}', [JobDescriptionController::class,'edit']);
    Route::post('job-description-update', [JobDescriptionController::class,'update']);
    Route::get('job-description-print/{ID}', [JobDescriptionController::class,'print']);
    Route::get('job-description-search/{query}', [JobDescriptionController::class,'search']);
    Route::delete('job-description-delete/{ID}', [JobDescriptionController::class,'delete']);
    Route::get('approved-job-description', [JobDescriptionController::class,'approvedJobDescription']);

    Route::post('job-description/get-employee-by-employee-code', [JobDescriptionController::class,'getEmployeeByEmployeeCode']);
    Route::post('job-description/get-supervisor-by-employee-code', [JobDescriptionController::class,'getSupervisorByEmployeeCode']);

    //Export
    Route::post('export-job-description-list',[JobDescriptionController::class,'exportActionPlan']);

    //End
    Route::get('get-all-employee-training-list', [CommonController::class,'getEmployeeTrainingList']);
    Route::get('get-agree-business-user', [CommonController::class,'getAgreeBusinessUser']);
    Route::get('get-all-session', [CommonController::class,'getAllSession']);
    Route::get('get-departments', [CommonController::class,'department']);
    Route::get('get-strategic-business-unit', [CommonController::class,'getSBU']);

    //chart report mdp-organized-pending-ptc
    Route::get('get-all-chart-report', [MDPChartController::class,'getAllChartReport']);
    Route::get('mdp-organized-pending-ptc/{Period}', [MDPChartController::class,'getOrganizedPendingPTC']);
    Route::get('mdp-organized-pending-ptc-details/{Period}/{Status}', [MDPChartController::class,'getOrganizedPendingPTCDetails']);
    Route::post('mdp-pending-ptc-report', [MDPChartController::class,'getPendingPTCReport']);
    Route::post('mdp-approved-ptc-report', [MDPChartController::class,'getApprovedPTCReport']);
    Route::post('mdp-total-report', [MDPChartController::class,'mdpTotalReport']);
    Route::post('mdp-organized-pending-ptc-title-wise-employee', [MDPChartController::class,'getOrganizedPendingPTCTitleWiseEmployee']);

    //Learning Transfer
    Route::get('mdp-period-wise-training/{Period}', [MDPChartController::class,'MDPPeriodWiseTraining']);
    Route::get('learning-transfer-details/{Period}/{TrainingTitle}', [MDPChartController::class,'MDPLearningTransferDetails']);
    Route::post('export-training',[MDPChartController::class,'exportTraining']);
    //Training Feedback
    Route::get('mdp-period-wise-feedback/{Period}', [MDPChartController::class,'MDPPeriodWiseFeedback']);
    Route::get('feedback-details/{Period}/{TrainingTitle}', [MDPChartController::class,'MDPPeriodWiseFeedbackDetails']);

    // For TAx Route
    Route::get('get-tax-supporting-data', [TaxController::class,'getSupportingData']);
    Route::get('send-otp', [TaxController::class,'sendOTP']);
    Route::get('verify-otp', [TaxController::class,'verifyOTP']);
    Route::get('get-tax-data', [TaxController::class,'getTaxData']);
    //TRA
    Route::get('get-tax-zone', [TRAController::class,'getTaxZone']);
    Route::get('get-tax-circle', [TRAController::class,'getTaxCircle']);
    Route::get('get-acknowledgement', [TRAController::class,'getAcknowledgment']);
    Route::get('get-periods', [TRAController::class,'getPeriods']);
    Route::post('store-tax-return', [TRAController::class,'storeTaxReturn']);
    Route::post('get-tra-report', [TRAController::class,'index']);
    Route::get('get-tra-emp-list/{Year}/{Dept}/{Status}', [TRAController::class,'taxableEmp']);

    Route::get('get-emp-data', [TRAController::class,'getViewEmpData']);

    Route::get('idea-hub', [IdeaHubController::class,'index']);
    Route::get('idea-hub-details/{ID}', [IdeaHubController::class,'show']);
    Route::post('store-idea', [IdeaHubController::class,'store']);



});

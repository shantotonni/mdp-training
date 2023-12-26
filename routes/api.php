<?php

use App\Http\Controllers\ActionPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\JobDescriptionController;
use App\Http\Controllers\MDPChartController;
use App\Http\Controllers\MDPController;
use App\Http\Controllers\MDPTrainigFeedbackController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SEPAutomationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\CommonController;


Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'jwt'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => ['jwt']], function () {

    Route::group(['prefix' => 'report'],function () {
        // Route::get('student-payment',[ReportController::class,'studentPayment']);
        // Route::get('export-student-payment-report',[ReportController::class,'studentPaymentReport']);
    });

    // ADMIN USERS
    Route::apiResource('users',UserController::class);
    Route::get('search/users/{query}', [UserController::class,'search']);

    //mdp route
    Route::get('mdp/list',[MDPController::class,'index']);
    Route::post('mdp/store',[MDPController::class,'store']);
    Route::get('mdp/edit/{ID}', [MDPController::class,'edit']);
    //Route::get('mdp/edit/{ID}', [MDPController::class,'edit']);
    Route::post('mdp/update', [MDPController::class,'update']);
    Route::get('mdp/print/{ID}', [MDPController::class,'print']);
    Route::get('search/mdp/list/{query}', [MDPController::class,'search']);
    Route::delete('mdp/delete/{ID}', [MDPController::class,'delete']);

    Route::post('get-employee-by-employee-code', [MDPController::class,'getEmployeeByEmployeeCode']);
    Route::post('get-supervisor-by-employee-code', [MDPController::class,'getSupervisorByEmployeeCode']);
    Route::get('get-level-wise-suggestive-list/{StaffID}', [MDPController::class,'getLevelWiseSuggestiveList']);
    Route::get('export-mdp-list', [MDPController::class,'mdpExport']);
    Route::get('export-mdp-feedback', [MDPController::class,'mdpFeedbackExport']);
    Route::get('mdp/get-top-ranked-training', [MDPController::class,'getTopRankedTraining']);
    Route::get('mdp/get-all-mdp-department', [MDPController::class,'getAllMDPDepartment']);
    Route::get('mdp/get-all-training-title', [MDPController::class,'getAllTrainingTitle']);
    Route::post('mdp/get-employee-wise-report', [MDPController::class,'getEmployeeWiseReport']);

    //individual tarining
    Route::get('mdp/get-employee-individual-training', [MDPController::class,'getEmployeeIndividualTraining']);

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
    Route::post('all-designation', [SEPAutomationController::class,'allDesignation']);
    Route::post('all-department', [SEPAutomationController::class,'allDepartment']);
    Route::post('all-portfolio', [SEPAutomationController::class,'allPortfolio']);



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

    //chart report mdp-organized-pending-ptc
    Route::get('mdp-organized-pending-ptc/{Period}', [MDPChartController::class,'getOrganizedPendingPTC']);
    Route::get('mdp-organized-pending-ptc-details/{Period}/{Status}', [MDPChartController::class,'getOrganizedPendingPTCDetails']);
    Route::post('mdp-organized-pending-ptc-title-wise-employee', [MDPChartController::class,'getOrganizedPendingPTCTitleWiseEmployee']);
    //Learning Transfer
    Route::get('mdp-period-wise-training/{Period}', [MDPChartController::class,'MDPPeriodWiseTraining']);
    Route::post('export-training',[MDPChartController::class,'exportTraining']);
    //Training Feedback
    Route::get('mdp-period-wise-feedback/{Period}', [MDPChartController::class,'MDPPeriodWiseFeedback']);

});

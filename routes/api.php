<?php

use App\Http\Controllers\ActionPlanController;
use App\Http\Controllers\MDPController;
use App\Http\Controllers\ReportController;
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
         Route::get('student-payment',[ReportController::class,'studentPayment']);
         Route::get('export-student-payment-report',[ReportController::class,'studentPaymentReport']);
    });

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
    //End

    Route::get('get-all-employee-training-list', [CommonController::class,'getEmployeeTrainingList']);
    Route::get('get-agree-business-user', [CommonController::class,'getAgreeBusinessUser']);

    //Export
    Route::post('export-action-plane-list',[ActionPlanController::class,'exportActionPlan']);
});

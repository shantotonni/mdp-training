<?php

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
    Route::get('mdp/edit/{ID}', [MDPController::class,'edit']);
    Route::post('mdp/update', [MDPController::class,'update']);
    Route::get('mdp/print/{ID}', [MDPController::class,'print']);
    Route::get('search/mdp/list/{query}', [MDPController::class,'search']);
    Route::delete('mdp/delete/{ID}', [MDPController::class,'delete']);

    Route::post('get-employee-by-employee-code', [MDPController::class,'getEmployeeByEmployeeCode']);
    Route::post('get-supervisor-by-employee-code', [MDPController::class,'getSupervisorByEmployeeCode']);
    Route::get('get-level-wise-suggestive-list/{StaffID}', [MDPController::class,'getLevelWiseSuggestiveList']);
    Route::get('export-mdp-list', [MDPController::class,'mdpExport']);


    Route::get('get-all-employee-training-list', [CommonController::class,'getEmployeeTrainingList']);
    Route::get('get-agree-business-user', [CommonController::class,'getAgreeBusinessUser']);
});

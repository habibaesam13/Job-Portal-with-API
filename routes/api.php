<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SeekerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//jobs routes
Route::get('/jobs',[JobController::class,'index']);

//employer routes
Route::get('/employers',[EmployerController::class,'index']);
Route::get('/EmpProfile/{id}',[EmployerController::class,'show']);
    //create job
    Route::post('/employer/{employerId}/jobs', [EmployerController::class, 'createJob']);
//seeker routes
Route::get('/SeekerProfile/{id}',[SeekerController::class,'show']);
Route::post('/seeker/{id}', [SeekerController::class, 'update']);
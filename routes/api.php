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

//seeker routes
Route::get('/profile/{id}',[SeekerController::class,'show']);

<?php

use App\Http\Controllers\Api\MsStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('GetStudent',[MsStudentController::class,'index']);
route::get('GetStudentDetail',[MsStudentController::class,'show']);
route::post('PostStudent',[MsStudentController::class,'store']);

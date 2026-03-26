<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AuthController;




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
   
     Route::get('/user/dashboard', [AuthController::class, 'dashboarduser']);
     Route::post('/create-student',[StudentController::class, 'createStudent']);
    Route::get('/student',[StudentController::class, 'getStudent']);
    Route::get('/edit-student/{id}',[StudentController::class, 'editStudent']);
    Route::put('/update-student/{id}',[StudentController::class, 'updateStudent']);
    Route::delete('/delete-student/{id}',[StudentController::class, 'deleteStudent']);

 
});












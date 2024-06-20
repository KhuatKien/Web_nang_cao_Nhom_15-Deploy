<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

//Register
Route::post('register',[ApiController::class,'register']);

//Login
Route::post('login',[ApiController::class,'login']);

//Profile
Route::group([
    "middleware" => ["auth:sanctum"]
],function(){
    Route::get('profile',[ApiController::class,'profile']);

    Route::get('logout',[ApiController::class,'logout']);
    
});


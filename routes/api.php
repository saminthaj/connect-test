<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChallengeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/import/attendance', [AttendanceController::class, 'import']);
Route::get('/challenge2', [ChallengeController::class, 'challenge2']);
Route::get('/challenge4', [ChallengeController::class, 'challenge4']);
Route::apiResource('attendance', class_basename(AttendanceController::class));

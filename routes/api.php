<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('create-video', [ApiController::class, 'createVideo'])
Route::post('upload-image', [ApiController::class, 'uploadImage']);

Route::post('post-user-datum', [ApiController::class, 'postUserDatum']);
Route::get('get-current-streak', [ApiController::class, 'getCurrentStreak']);
Route::get('get-days-left', [ApiController::class, 'getDaysLeft']);

Route::get('get-objectives-names', [ApiController::class, 'getObjectivesNames']);
Route::post('post-objective', [ApiController::class, 'postObjective']);



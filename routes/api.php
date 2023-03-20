<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('exam')->group(function () {
    Route::get('/', [ExamController::class, 'index']);
    Route::post('/create', [ExamController::class, 'store']);
    Route::get('/{exam}', [ExamController::class, 'show']);
    Route::put('/{exam}', [ExamController::class, 'update']);
    Route::delete('/{exam}', [ExamController::class, 'destroy']);
});
Route::prefix('question')->group(function () {
    Route::get('/', [QuestionController::class, 'index']);
    Route::post('/create', [QuestionController::class, 'store']);
    Route::get('/{question}', [QuestionController::class, 'show']);
    Route::put('/{question}', [QuestionController::class, 'update']);
    Route::delete('/{question}', [QuestionController::class, 'destroy']);
});
Route::prefix('answer')->group(function () {
    Route::get('/', [AnswerController::class, 'index']);
    Route::post('/create', [AnswerController::class, 'store']);
    Route::get('/{answer}', [AnswerController::class, 'show']);
    Route::put('/{answer}', [AnswerController::class, 'update']);
    Route::delete('/{answer}', [AnswerController::class, 'destroy']);
});

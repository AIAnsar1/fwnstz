<?php

use App\Http\Middleware\RBAC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\{EmailVerificationCodeController, AdvertisementsController, CategoryController, UserController};





Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('/auth')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/check-user-token', [AuthController::class, 'checkUserToken']);
    Route::post('/update-your-self', [AuthController::class, 'updateYourself']);
})->middleware(['auth:api', RBAC::class]);

Route::prefix('/application')->group( function () {
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/advertisements', AdvertisementsController::class);
});


Route::post('/email-verification', [EmailVerificationCodeController::class, 'sendEmailVerification']);
Route::post('/check-email-verification', [EmailVerificationCodeController::class, 'checkEmailVerification']);



<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\InviteController;
use App\Http\Controllers\BattlePassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('referral/{code}', [InviteController::class, 'getReferralUsername']);
Route::post('bbcode/preview', [ApiController::class, 'getBBCodePreview'])->name('bbcode.preview');
Route::get('rewards/{id}', [ApiController::class, 'getRewardById']);

Route::prefix('hotel')
    ->name('hotel.')
    ->group(function() {
        Route::get('online-count', [ApiController::class, 'getOnlineCount'])->name('online-count');
    });

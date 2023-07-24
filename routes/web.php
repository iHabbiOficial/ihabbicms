<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    WebController,
    JailController,
    ClientController,
    ArticleController,
    External\RconController,
    Article\ArticleCommentController,
    Api\ApiController,
    CameraController,
    HelpQuestionController,
    RankingController,
    StaffController,
    ShopController,
    UserSettingController,
    BattlePassController
};
use App\Http\Controllers\Auth\AuthSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/set-language/{language}', [WebController::class, 'setLanguage'])->name('set-language');

Route::get('/api/user/{username}/look', [ApiController::class, 'getLookByUsername']);

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/login', [WebController::class, 'index'])->name('login');
Route::get('/register', [WebController::class, 'index'])->name('register');

Route::post('/logout', [AuthSessionController::class, 'destroy'])->name('logout');

Route::get('jail', [JailController::class, 'show'])->name('jail');
Route::get('maintenance', [WebController::class, 'maintenance'])->name('maintenance');

Route::post('/battlepass/confirm', [BattlePassController::class, 'confirmReward'])->name('battlepass.confirm');
Route::get('/api/user/rewards', [BattlePassController::class, 'getUserRewards']);

Route::prefix('hotel')
    ->name('hotel.')
    ->middleware('auth')
    ->group(function () {
        Route::get('nitro', [ClientController::class, 'nitro'])->name('nitro');
        Route::get('nitro-flash', [ClientController::class, 'nitroFlash'])->name('nitroFlash');

        Route::prefix('rcon')
            ->name('rcon.')
            ->group(function () {
                Route::post('follow-user/{user}', [RconController::class, 'followUser'])->name('follow-user')
                    ->middleware('throttle:15,1');
            });
    });

Route::prefix('articles')
    ->name('articles.')
    ->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('{id}/{slug}', [ArticleController::class, 'show'])->name('show');

        Route::post('{id}/{slug}/comment', [ArticleCommentController::class, 'store'])
            ->middleware('auth')
            ->name('comments.store');

        Route::post('{id}/{slug}/react', [ArticleController::class, 'toggleReaction'])
            ->middleware('auth')
            ->name('reactions.toggle');
    });

Route::prefix('community')
    ->name('community.')
    ->group(function () {
        // Photos Routes
        Route::prefix('photos')
            ->name('photos.')
            ->group(function () {
                Route::get('/', [CameraController::class, 'index'])->name('index');
                Route::post('photo/{camera:id}/like', [CameraController::class, 'toggleLike'])
                    ->middleware('auth')
                    ->name('like');
            });

        Route::get('staff', [StaffController::class, 'index'])->name('staffs.index');
        Route::get('rankings', RankingController::class)
            ->middleware('auth')
            ->name('rankings.index');
    });

Route::prefix('shop')
    ->name('shop.')
    ->group(function () {
        Route::get('/', ShopController::class)->name('index');
    });

Route::prefix('user')
    ->name('users.')
    ->middleware('auth')
    ->group(function () {

        // User Settings
        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {
                Route::match(['GET', 'POST'], '/{page?}', [UserSettingController::class, 'index'])->name('index');
            });
    });

Route::prefix('support')
    ->name('support.')
    ->middleware('auth', 'throttle:60,1')
    ->group(function() {
        Route::prefix('questions')
            ->name('questions.')
            ->group(function() {
                Route::get('/', [HelpQuestionController::class, 'index'])->name('index');
                Route::get('category/{slug}', [HelpQuestionController::class, 'category'])->name('categories.show');
                Route::get('{id}/{slug}', [HelpQuestionController::class, 'show'])->name('show');
            });
    });

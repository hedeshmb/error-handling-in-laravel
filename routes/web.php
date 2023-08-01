<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MakeExceptionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

    Route::get('log', [LogController::class, 'index'])->name('logList');
    Route::get('log/{logId}', [LogController::class, 'show'])->name('logDetail');
    Route::get('log/delete/{logId}', [LogController::class, 'delete'])->name('logDelete');

    route::get('not-found-class-exception', [MakeExceptionController::class, 'notFoundClassException']);
    route::get('connection-exception', [MakeExceptionController::class, 'connectionException']);
    route::post('method-not-allowed-http-exception', [MakeExceptionController::class, 'methodNotAllowedHttpException']);


    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});


Route::get('/', function () {
    if (isset(Auth()->user()->id)) {
        return redirect('dashboard');
    }
    return view('session/login-session');
});
Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnlineSupportPlatformController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Session;

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
Route::get('/', function () {
    if(Session::exists('token-key')) {
        return redirect()->intended('dashboard');
    }else{
        return redirect()->intended('ticket');
    }
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('agent/login', [LoginController::class, 'agentLogin'])->name('agent-login');
Route::get('agent/logout', [LoginController::class, 'agentLogout'])->name('agent-logout');

Route::get('dashboard', [OnlineSupportPlatformController::class, 'dashboard'])->name('dashboard');
Route::get('ticket', [OnlineSupportPlatformController::class, 'ticket'])->name('ticket');
Route::get('complain', [OnlineSupportPlatformController::class, 'complain'])->name('customer-complains');
Route::get('customer/{id}/complain', [OnlineSupportPlatformController::class, 'complainInfo'])->name('customer-complain-info');
Route::post('customer/{id}/comment', [OnlineSupportPlatformController::class, 'complainAddComment'])->name('customer-comment');
Route::post('ticket/create', [OnlineSupportPlatformController::class, 'createTicket'])->name('create-ticket');

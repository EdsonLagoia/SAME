<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AccessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ChartController;


Route::get('/login', [AccessController::class, 'login'])->name('login');
Route::post('/authentication', [AccessController::class, 'authentication']);
Route::get('/change-password', [AccessController::class, 'change_password'])->middleware('auth');
Route::post('/new-password', [AccessController::class, 'new_password'])->middleware('auth');
Route::get('/', [AccessController::class, 'index'])->middleware('auth');
Route::post('/logout', [AccessController::class, 'logout'])->middleware('auth');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'edit']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::put('/function/{id}', [UserController::class, 'function']);
});

Route::prefix('patient')->middleware('auth')->group(function(){
    Route::get('/', [PatientController::class, 'index']);
    Route::get('/create', [PatientController::class, 'create']);
    Route::post('/store', [PatientController::class, 'store']);
    Route::get('/{id}', [PatientController::class, 'edit']);
    Route::put('/update/{id}', [PatientController::class, 'update']);
});

Route::get('/load-patient', [PatientController::class, 'loadPatient'])->name('loadPatient')->middleware('auth');
<?php

use App\Http\Controllers\AlarmController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [TransactionController::class, "index"]);

Route::post('/transactions', [TransactionController::class, "store"])->name("transactions.store");

Route::delete('/transactions/{id}', [TransactionController::class, "destroy"])->name("transaction.destroy");

Route::post('/alarms', [AlarmController::class, "store"])->name("alarm.store");

// Route::get('/', function () {
//     return view('index');
// });

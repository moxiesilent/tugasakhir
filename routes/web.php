<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\BentukhargaController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\PrimaryController;
use App\Http\Controllers\CalonpembeliController;
use App\Http\Controllers\TipepropertiController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ReminderController;

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
    return view('index');
});

Route::resource('surats',SuratController::class);

Route::get('/surat', [ SuratController::class, "index" ]);
Route::get('/bentukharga', [ BentukhargaController::class, "index" ]);
Route::get('/lantai', [ LantaiController::class, "index" ]);
Route::get('/tipeproperti', [ TipepropertiController::class, "index" ]);
Route::get('/calonpembeli', [ CalonpembeliController::class, "index" ]);
Route::get('/primary', [ PrimaryController::class, "index" ]);
Route::get('/agen', [ AgenController::class, "index" ]);
Route::get('/reminder', [ ReminderController::class, "index" ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

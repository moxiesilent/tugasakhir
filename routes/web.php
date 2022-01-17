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
Route::resource('tipepropertis',TipepropertiController::class);
Route::resource('primarys',PrimaryController::class);
Route::resource('lantais',LantaiController::class);
Route::resource('calonpembelis',CalonpembeliController::class);
Route::resource('bentukhargas',BentukhargaController::class);
Route::resource('agens',AgenController::class);

Route::get('/surat', [ SuratController::class, "index" ])->name('surat');
Route::get('/bentukharga', [ BentukhargaController::class, "index" ])->name('bentukharga');
Route::get('/lantai', [ LantaiController::class, "index" ])->name('lantai');
Route::get('/tipeproperti', [ TipepropertiController::class, "index" ])->name('tipeproperti');
Route::get('/calonpembeli', [ CalonpembeliController::class, "index" ])->name('calonpembeli');
Route::get('/primary', [ PrimaryController::class, "index" ])->name('primary');
Route::get('/agen', [ AgenController::class, "index" ])->name('agen');
Route::get('/reminder', [ ReminderController::class, "index" ])->name('reminder');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

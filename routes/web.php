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
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TipeapartemenController;

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
Route::resource('tipeapartemens',TipeapartemenController::class);
Route::resource('primarys',PrimaryController::class);
Route::resource('lantais',LantaiController::class);
Route::resource('calonpembelis',CalonpembeliController::class);
Route::resource('bentukhargas',BentukhargaController::class);
Route::resource('agens',AgenController::class);
Route::resource('listings',ListingController::class);

Route::post('/hapussurat', [ SuratController::class, "hapussurat" ])->name('hapussurat');
Route::post('/hapustipeproperti', [ TipepropertiController::class, "hapustipeproperti" ])->name('hapustipeproperti');
Route::post('/hapusprimary', [ PrimaryController::class, "hapusprimary" ])->name('hapusprimary');
Route::post('/hapusbentukharga', [ BentukhargaController::class, "hapusbentukharga" ])->name('hapusbentukharga');
Route::post('/hapuslantai', [ LantaiController::class, "hapuslantai" ])->name('hapuslantai');
Route::post('/hapusagen', [ AgenController::class, "hapusagen" ])->name('hapusagen');
Route::post('/hapuslisting', [ ListingController::class, "hapuslisting" ])->name('hapuslisting');
Route::post('/hapustipeapartemen', [ TipeapartemenController::class, "hapustipeapartemen" ])->name('hapustipeapartemen');

Route::get('/surat', [ SuratController::class, "index" ])->name('surat');
Route::get('/bentukharga', [ BentukhargaController::class, "index" ])->name('bentukharga');
Route::get('/lantai', [ LantaiController::class, "index" ])->name('lantai');
Route::get('/tipeproperti', [ TipepropertiController::class, "index" ])->name('tipeproperti');
Route::get('/calonpembeli', [ CalonpembeliController::class, "index" ])->name('calonpembeli');
Route::get('/primary', [ PrimaryController::class, "index" ])->name('primary');
Route::get('/primary/{id}', [ PrimaryController::class, "show" ]);
Route::get('/agen', [ AgenController::class, "index" ])->name('agen');
Route::get('/agen/{id}', [ AgenController::class, "show" ]);
Route::get('/reminder', [ ReminderController::class, "index" ])->name('reminder');
Route::get('/listing', [ ListingController::class, "index" ])->name('listing');
Route::get('/tipeapartemen', [ TipeapartemenController::class, "index" ])->name('tipeapartemen');

Route::post('/getkota', [ ListingController::class, "getKota" ])->name('getKota');
Route::post('/getkecamatan', [ ListingController::class, "getKecamatan" ])->name('getKecamatan');
Route::post('/kelurahan', [ ListingController::class, "getKelurahan" ])->name('getKelurahan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

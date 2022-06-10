<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [ HomeController::class, "laporan" ]);
Route::get('/notadmin', [ HomeController::class, "bukanAdmin" ])->middleware('auth');

Route::resource('surats',SuratController::class)->middleware('auth');
Route::resource('tipepropertis',TipepropertiController::class)->middleware('auth');
Route::resource('tipeapartemens',TipeapartemenController::class)->middleware('auth');
Route::resource('primarys',PrimaryController::class)->middleware('auth');
Route::resource('lantais',LantaiController::class)->middleware('auth');
Route::resource('calonpembelis',CalonpembeliController::class)->middleware('auth');
Route::resource('bentukhargas',BentukhargaController::class)->middleware('auth');
Route::resource('agens',AgenController::class)->middleware('auth');
Route::resource('reminders',ReminderController::class)->middleware('auth');
Route::resource('listings',ListingController::class)->middleware('auth');

Route::post('/hapussurat', [ SuratController::class, "hapussurat" ])->name('hapussurat')->middleware('auth');
Route::post('/hapustipeproperti', [ TipepropertiController::class, "hapustipeproperti" ])->name('hapustipeproperti')->middleware('auth');
Route::post('/hapusprimary', [ PrimaryController::class, "hapusprimary" ])->name('hapusprimary')->middleware('auth');
Route::post('/hapusbentukharga', [ BentukhargaController::class, "hapusbentukharga" ])->name('hapusbentukharga')->middleware('auth');
Route::post('/hapuslantai', [ LantaiController::class, "hapuslantai" ])->name('hapuslantai')->middleware('auth');
Route::post('/hapusagen', [ AgenController::class, "hapusagen" ])->name('hapusagen')->middleware('auth');
Route::post('/resetpassword', [ AgenController::class, "resetpassword" ])->name('resetpassword')->middleware('auth');
Route::post('/hapuslisting', [ ListingController::class, "hapuslisting" ])->name('hapuslisting')->middleware('auth');
Route::post('/juallisting', [ ListingController::class, "juallisting" ])->name('juallisting')->middleware('auth');
Route::post('/pendinglisting', [ ListingController::class, "pendinglisting" ])->name('pendinglisting')->middleware('auth');
Route::post('/availablelisting', [ ListingController::class, "availablelisting" ])->name('availablelisting')->middleware('auth');
Route::post('/hapustipeapartemen', [ TipeapartemenController::class, "hapustipeapartemen" ])->name('hapustipeapartemen')->middleware('auth');

Route::get('/surat', [ SuratController::class, "index" ])->name('surat')->middleware('auth');
Route::get('/bentukharga', [ BentukhargaController::class, "index" ])->name('bentukharga')->middleware('auth');
Route::get('/lantai', [ LantaiController::class, "index" ])->name('lantai')->middleware('auth');
Route::get('/tipeproperti', [ TipepropertiController::class, "index" ])->name('tipeproperti')->middleware('auth');
Route::get('/calonpembeli', [ CalonpembeliController::class, "index" ])->name('calonpembeli')->middleware('auth');
Route::get('/primary', [ PrimaryController::class, "index" ])->name('primary')->middleware('auth');
Route::get('/agen', [ AgenController::class, "index" ])->name('agen')->middleware('auth');
Route::get('/reminder', [ ReminderController::class, "index" ])->name('reminder')->middleware('auth');
Route::get('/listing', [ ListingController::class, "index" ])->name('listing')->middleware('auth');
Route::get('/tipeapartemen', [ TipeapartemenController::class, "index" ])->name('tipeapartemen')->middleware('auth');
Route::get('/view/listing/{id}',[ FrontEndController::class, "viewFrontEnd"]);

Route::post('/getkota', [ ListingController::class, "getKota" ])->name('getKota')->middleware('auth');
Route::post('/getkecamatan', [ ListingController::class, "getKecamatan" ])->name('getKecamatan')->middleware('auth');
Route::post('/kelurahan', [ ListingController::class, "getKelurahan" ])->name('getKelurahan')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

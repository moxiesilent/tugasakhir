<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ListingApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/halamanutama', [ ApiController::class, "tampilHalamanUtama" ]);
Route::get('/halamanlisting', [ ApiController::class, "tampilHalamanListing" ]);
Route::post('/halamanprofil', [ ApiController::class, "tampilHalamanProfil" ]);
Route::get('/halamanlistprimary',[ ApiController::class, "tampilHalamanListPrimary"]);
Route::get('/detaillisting/{kode}', [ApiController::class, "tampilDetailListing"]);
Route::get('/detailprimary/{idprimary}', [ApiController::class, "tampilDetailPrimary"]);
Route::get('/listingtipeproperti/{idtipeproperti}', [ApiController::class, "tampilListingTipeproperti"]);
Route::get('/mylisting/{idagen}', [ ApiController::class, "tampilMyListing"]);
Route::post('/cobalogin', [ ApiController::class, "prosesLogin" ]);
Route::post('/listings', [ ListingApiController::class, "store"] );

Route::get('/provinsis',[ ApiController::class, "getProvinsi"] );
Route::get('/kotas/{idprovinsi}', [ ApiController::class, "getKota"] );
Route::get('/kecamatans/{idkota}', [ ApiController::class, "getKecamatan"] );
Route::get('/kelurahans/{idkecamatan}', [ ApiController::class, "getKelurahan"] );

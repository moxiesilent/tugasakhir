<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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
Route::get('/detaillisting/{kode}', [ApiController::class, "tampilDetailListing"]);
Route::get('/detailprimary/{idprimary}', [ApiController::class, "tampilDetailPrimary"]);
Route::get('/listingtipeproperti/{idtipeproperti}', [ApiController::class, "tampilListingTipeproperti"]);
Route::post('/login', [ ApiController::class, "prosesLogin" ]);

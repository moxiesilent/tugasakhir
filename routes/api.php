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

Route::get('/tipepropertis', [ ApiController::class, "getTipeproperti" ]);
Route::get('/tipeapartemens', [ ApiController::class, "getTipeapartemen" ]);
Route::get('/lantais', [ ApiController::class, "getLantai" ]);
Route::get('/bentukhargas', [ ApiController::class, "getBentukharga" ]);
Route::get('/jenissurats', [ ApiController::class, "getJenissurat" ]);
Route::get('/calonpembelis/{idagen}', [ ApiController::class, "getCalonpembeli" ]);

Route::get('/kprs/{idagen}', [ApiController::class, "getKpr"]);
Route::get('/clearkpr/{idkpr}', [ApiController::class, "clearKpr"]);
Route::get('/clearallkpr/{idagen}', [ApiController::class, "clearAllKpr"]);
Route::get('/estimasis/{idagen}', [ApiController::class, "getEstimasi"]);
Route::get('/clearestimasi/{idestimasi}', [ApiController::class, "clearEstimasi"]);
Route::get('/clearallestimasi/{idagen}', [ApiController::class, "clearAllEstimasi"]);

Route::get('/halamanutama', [ ApiController::class, "tampilHalamanUtama" ]);
// Route::get('/halamanlisting/{idagen}', [ ApiController::class, "tampilHalamanListing" ]);
Route::post('/halamanlisting', [ ApiController::class, "tampilHalamanListing" ]);
Route::get('/halamanprofil/{idagen}', [ ApiController::class, "tampilHalamanProfil" ]);
Route::get('/halamanlistprimary',[ ApiController::class, "tampilHalamanListPrimary"]);
Route::get('/detaillisting/{idagen}/{kode}', [ApiController::class, "tampilDetailListing"]);
Route::get('/detailprimary/{idprimary}', [ApiController::class, "tampilDetailPrimary"]);
Route::get('/listingtipeproperti/{idtipeproperti}', [ApiController::class, "tampilListingTipeproperti"]);
Route::get('/mylisting/{idagen}', [ ApiController::class, "tampilMyListing"]);
Route::post('/cobalogin', [ ApiController::class, "prosesLogin" ]);
Route::post('/cobaaddlisting', [ ApiController::class, "addListing"] );
Route::post('/updatelisting', [ ApiController::class, "updateListing"] );
Route::post('/deletelisting', [ ApiController::class, "deleteListing"]);
Route::post('/addbookmark', [ ApiController::class, "addBookmark"] );
Route::post('/deletebookmark', [ ApiController::class, "deleteBookmark"] );

Route::post('/deletefotolisting', [ ApiController::class, "deleteFotoListing"] );
Route::get('/getfotolisting/{idlisting}', [ ApiController::class, "getMultiFoto"] );
Route::get('/daftarcalonpembelis', [ ApiController::class, "daftarCalonpembeli"] );
Route::post('/addkpr', [ ApiController::class, "addKpr"] );
Route::post('/addestimasi', [ ApiController::class, "addEstimasi"] );

Route::post('/addcalonpembeli', [ ApiController::class, "addCalonPembeli" ]);
Route::post('/updatecalonpembeli', [ ApiController::class, "updateCalonPembeli" ]);
Route::get('/deletecalonpembeli/{idcalonpembeli}', [ ApiController::class, "deleteCalonPembeli" ]);

Route::post('/addfotolisting', [ ApiController::class, "addFotoListing"] );
Route::get('/profils/{idagen}', [ ApiController::class, "getProfil" ]);
Route::post('/updateprofil', [ ApiController::class, "updateProfil" ]);
Route::get('/detailcalonpembeli/{idcalonpembeli}', [ ApiController::class, "detailCalonPembeli" ]);
Route::get('/bookmark/{idagen}', [ ApiController::class, "bookmark" ]);


Route::get('/provinsis',[ ApiController::class, "getProvinsi"] );
Route::get('/kotas/{idprovinsi}', [ ApiController::class, "getKota"] );
Route::get('/kecamatans/{idkota}', [ ApiController::class, "getKecamatan"] );
Route::get('/kelurahans/{idkecamatan}', [ ApiController::class, "getKelurahan"] );

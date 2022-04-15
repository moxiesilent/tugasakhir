<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipeproperti;
use App\Models\Listing;
use App\Models\Bentukharga;
use App\Models\Primary;
use App\Models\Lantai;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tipeapartemen;
use App\Models\Surat;
use App\Models\Foto;
use App\Models\Calonpembeli;
use App\Models\User;
use DB;

class ApiController extends Controller
{
    public function tampilHalamanUtama()
    {
        $tipeproperti = Tipeproperti::all();
        $listing = Listing::orderBy('created_at','desc')->limit(10)->get();
        $primary = Primary::orderBy('idprimary','desc')->limit(5)->get();
        return response()->json(['message' => 'Success', 'tipeproperti' => $tipeproperti, 'listing'=> $listing, 'primary'=> $primary]);
    }

    public function tampilHalamanListing()
    {
        $listing = Listing::all();
        return response()->json(['message' => 'Success', 'listing'=> $listing]);
    }

    public function tampilHalamanprofil(){
        $agen = DB::table('agens')->where('email')->value('');
        return response()->json(['message' => 'Success', 'agen' => $agen]);
    }

    public function tampilDetailListing($kode){
        $listing = Listing::find($kode);
        $foto = DB::table('fotos')->where('listing_kode_listing',$kode)->get();
        return response()->json(['message' => 'Success', 'listing'=> $listing, 'foto'=> $foto]);
    }

    public function prosesLogin(Request $request)
    {
        $password = Hash::make($request->password);
        $user = User::where('email',$request->email)->where('password',$password)->first();

        if($user != null)
        {
            return response()->json(['message' => 'Success', 'user'=> $user]);
        } else {
            return response()->json(['message' => 'Error']);
        }
    }
}

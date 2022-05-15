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

class ListingApiController extends Controller
{
    public function store(Request $request)
    {
        // try{
            $data = new Listing();

            $data->kode_listing = $request->get('kode');
            $data->agen_idagen = $request->get('idagen');
            $data->alamat_domisili = $request->get('alamatdomisili');
            $data->nomor_hp_pemilik = $request->get('hppemilik');
            $data->surat_kepemilikan_atasnama = $request->get('skan');
            $data->alamat_properti = $request->get('alamatproperti');
            if($request->get('tipeapartemen') != '0'){
                $data->tipe_apartemens_idtipe_apartemen = $request->get('tipeapartemen');
            }
            $data->tower = $request->get('tower');
            $data->cluster = $request->get('cluster');
            $data->luas_tanah = $request->get('lt');
            $data->luas_bangunan = $request->get('lb');
            $data->dimensi_tanah_lebar = $request->get('dtl');
            $data->dimensi_tanah_panjang = $request->get('dtp');
            $data->kamar_tidur = $request->get('kt');
            $data->kamar_mandi = $request->get('km');
            $data->kamar_tidur_pembantu = $request->get('ktp');
            $data->kamar_mandi_pembantu = $request->get('kmp');
            $data->jumlah_lantai = $request->get('jumlahlantai');
            $data->nomor_lantai = $request->get('nomorlantai');
            $data->nomor_unit = $request->get('nomorunit');
            $data->view = $request->get('view');
            $data->listrik = $request->get('listrik');
            $data->dapur = $request->get('dapur');
            $data->carport = $request->get('carport');
            $data->garasi = $request->get('garasi');
            $data->hadap = $request->get('hadap');
            $data->tipe_listing = $request->get('tipelisting');
            $data->air = $request->get('air');
            $data->pemegang_hak = $request->get('pemeganghak');
            $data->mulai_tanggal = $request->get('mulaitanggal');
            $data->harga = $request->get('harga');
            $data->berakhir_tanggal = $request->get('berakhirtanggal');
            $data->posisi = $request->get('posisi');
            $data->perabotan = $request->get('perabotan');
            $data->komisi = $request->get('komisi');
            $data->pasang_banner = $request->get('banner');
            $data->bentuk_harga_idbentuk_harga = $request->get('idbh');
            $data->jenis_surat_idjenis_surat = $request->get('idjs');
            $data->tipe_properti_idtipe_properti = $request->get('idtp');
            $data->jenis_lantai_idjenis_lantai = $request->get('idjl');
            $data->kelurahans_idkelurahan = $request->get('kelurahan');
            $data->catatan = $request->get('catatan');
            $data->status = 'available';
            $data->jenis_listing = $request->get('jenislisting');
            $data->judul = $request->get('judul');
            if($request->hasFile('fotoutama')){
                $file=$request->file('fotoutama');
                $imgFolder='images/listing';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $data->foto_utama=$imgFile;
            }
            $data->save();
            
            if($request->hasFile('foto')){
                foreach($request->file('foto') as $key => $file){
                    $foto = new Foto();
                    $foto->listing_kode_listing = $request->get('kode');
                    $imgFolder='images/listing';
                    $imgFile=time().'_'.$file->getClientOriginalName();
                    $file->move($imgFolder,$imgFile);
                    $foto->path=$imgFile;
                    $foto->save();
                }
            }
            
            return response()->json(['message' => 'Success', 'listing'=> $data]);        // }
        // catch(\PDOException $e){
        //     $msg ="Gagal menambah data. ";
        //     return redirect()->route('listings.index')->with('error', $msg);
        // }
    }
}

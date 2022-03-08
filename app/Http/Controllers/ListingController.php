<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use App\Models\Surat;
use App\Models\Lantai;
use App\Models\Foto;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Bentukharga;
use App\Models\Tipeproperti;
use Illuminate\Http\Request;
use Illuminate\Facade\File;
use DB;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Listing::all();
        return view('listing.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agen = User::all();
        $jenislantai = Lantai::all();
        $bentukharga = Bentukharga::all();
        $jenissurat = Surat::all();
        $tipeproperti = Tipeproperti::all();
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        return view("listing.create",compact('agen','jenislantai','bentukharga','jenissurat','tipeproperti','provinsi','kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $data->jenis_listing = $request->get('jenislisting');
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
            
            return redirect()->route('listings.index')->with('status','data baru telah ditambahkan');     
        // }
        // catch(\PDOException $e){
        //     $msg ="Gagal menambah data. ";
        //     return redirect()->route('listings.index')->with('error', $msg);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $data = $listing;
        $jenislantai = Lantai::all();
        $bentukharga = Bentukharga::all();
        $jenissurat = Surat::all();
        $tipeproperti = Tipeproperti::all();
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        return view("listing.edit",compact('data','jenislantai','bentukharga','jenissurat','tipeproperti','provinsi','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }

    public function getKota(Request $request){
        $kota = DB::table('kotas')->where('provinsis_idprovinsi',$request->idprov)->get();
        return response()->json([
            'listkota' => $kota
        ]);
    }

    public function getKecamatan(Request $request){
        $kecamatan = DB::table('kecamatans')->where('kotas_idkota',$request->idkota)->get();
        return response()->json([
            'listkecamatan' => $kecamatan
        ]);
    }

    public function getKelurahan(Request $request){
        $kelurahan = DB::table('kelurahans')->where('kecamatans_idkecamatan',$request->idkecamatan)->get();
        return response()->json([
            'listkelurahan' => $kelurahan
        ]);
    }


}

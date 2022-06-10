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
use App\Models\Tipeapartemen;
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
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
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
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $agen = User::all();
        $jenislantai = Lantai::all();
        $bentukharga = Bentukharga::all();
        $jenissurat = Surat::all();
        $tipeproperti = Tipeproperti::all();
        $tipeapartemen = Tipeapartemen::all();
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        return view("listing.create",compact('agen','jenislantai','bentukharga','jenissurat','tipeproperti','tipeapartemen','provinsi','kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
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
            $idlisting = Listing::latest()->get('idlisting');
            if($request->hasFile('foto')){
                foreach($request->file('foto') as $key => $file){
                    $foto = new Foto();
                    $foto->listings_idlisting = $idlisting;
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
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $listing;
        $foto = DB::table('fotos')->where('listings_idlisting',$listing->idlisting)->get();
        return view("listing.show",compact('data','foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $listing;
        $jenislantai = Lantai::all();
        $bentukharga = Bentukharga::all();
        $jenissurat = Surat::all();
        $tipeproperti = Tipeproperti::all();
        $tipeapartemen = Tipeapartemen::all();
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        return view("listing.edit",compact('data','jenislantai','bentukharga','jenissurat','tipeproperti','tipeapartemen','provinsi','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing, Foto $foto)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $idlisting = $request->get('idlisting');
        $listing->alamat_domisili = $request->get('alamatdomisili');
        $listing->nomor_hp_pemilik = $request->get('hppemilik');
        $listing->surat_kepemilikan_atasnama = $request->get('skan');
        $listing->alamat_properti = $request->get('alamatproperti');
        if($request->get('tipeapartemen') != '0'){
            $listing->tipe_apartemens_idtipe_apartemen = $request->get('tipeapartemen');
        }
        $listing->tower = $request->get('tower');
        $listing->cluster = $request->get('cluster');
        $listing->luas_tanah = $request->get('lt');
        $listing->luas_bangunan = $request->get('lb');
        $listing->dimensi_tanah_lebar = $request->get('dtl');
        $listing->dimensi_tanah_panjang = $request->get('dtp');
        $listing->kamar_tidur = $request->get('kt');
        $listing->kamar_mandi = $request->get('km');
        $listing->kamar_tidur_pembantu = $request->get('ktp');
        $listing->kamar_mandi_pembantu = $request->get('kmp');
        $listing->jumlah_lantai = $request->get('jumlahlantai');
        $listing->nomor_lantai = $request->get('nomorlantai');
        $listing->nomor_unit = $request->get('nomorunit');
        $listing->view = $request->get('view');
        $listing->listrik = $request->get('listrik');
        $listing->dapur = $request->get('dapur');
        $listing->carport = $request->get('carport');
        $listing->garasi = $request->get('garasi');
        $listing->hadap = $request->get('hadap');
        $listing->tipe_listing = $request->get('tipelisting');
        $listing->air = $request->get('air');
        $listing->pemegang_hak = $request->get('pemeganghak');
        $listing->mulai_tanggal = $request->get('mulaitanggal');
        $listing->harga = $request->get('harga');
        $listing->berakhir_tanggal = $request->get('berakhirtanggal');
        $listing->posisi = $request->get('posisi');
        $listing->perabotan = $request->get('perabotan');
        $listing->komisi = $request->get('komisi');
        $listing->pasang_banner = $request->get('banner');
        $listing->bentuk_harga_idbentuk_harga = $request->get('idbh');
        $listing->jenis_surat_idjenis_surat = $request->get('idjs');
        $listing->tipe_properti_idtipe_properti = $request->get('idtp');
        $listing->jenis_lantai_idjenis_lantai = $request->get('idjl');
        $listing->catatan = $request->get('catatan');
        $listing->status = 'available';
        $listing->jenis_listing = $request->get('jenislisting');
        $listing->judul = $request->get('judul');
        if($request->hasFile('fotoutama')){
            $dest='images/listing/'.$listing->foto_utama;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('fotoutama');
            $imgFolder='images/listing/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $listing->foto_utama=$imgFile;
        }
        $listing->save();

        if($request->hasFile('foto')){
            foreach($request->file('foto') as $key => $file){
                $foto = new Foto();
                $foto->listings_idlisting = $idlisting;
                $imgFolder='images/listing';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $foto->path=$imgFile;
                $foto->save();
            }
        }

        return redirect()->route('listings.index')->with('status','data berhasil diubah');
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

    public function hapuslisting(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $idlisting = $request->get('idlisting');
            $listing = Listing::find($idlisting);
            $foto = DB::table('fotos')->where('listings_idlisting', $idlisting)->delete();
            $bookmark = DB::table('bookmarks')->where('listings_idlisting', $idlisting)->delete();
            $listing->delete();
            return redirect()->route('listings.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('listings.index')->with('error', $msg);
        }
    }

    public function getKota(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $kota = DB::table('kotas')->where('provinsis_idprovinsi',$request->idprov)->get();
        return response()->json([
            'listkota' => $kota
        ]);
    }

    public function getKecamatan(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $kecamatan = DB::table('kecamatans')->where('kotas_idkota',$request->idkota)->get();
        return response()->json([
            'listkecamatan' => $kecamatan
        ]);
    }

    public function getKelurahan(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $kelurahan = DB::table('kelurahans')->where('kecamatans_idkecamatan',$request->idkecamatan)->get();
        return response()->json([
            'listkelurahan' => $kelurahan
        ]);
    }

    public function jualListing(Request $request){
        // dd($request);
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $listing = Listing::find($request->id);
            $listing->status = 'Sold';
            $listing->save();
            return redirect('listings/'.$listing->id)->with('status','status listing berhasil diubah');
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('listings.index')->with('error', $msg);
        }
    }

    public function availableListing(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{    
            $listing = Listing::find($request->id);
            $listing->status = 'Available';
            $listing->save();
            return redirect('listings/'.$listing->id)->with('status','status listing berhasil diubah');
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('listings.index')->with('error', $msg);
        }
    }

    public function pendingListing(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $listing = Listing::find($request->id);
            $listing->status = 'Pending';
            $listing->save();
            return redirect('listings/'.$listing->id)->with('status','status listing berhasil diubah');
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('listings.index')->with('error', $msg);
        }
    }
}

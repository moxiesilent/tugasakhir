<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipeproperti;
use App\Models\Listing;
use App\Models\Bentukharga;
use App\Models\Primary;
use App\Models\Reminder;
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
use App\Models\Kpr;
use App\Models\Laporan;
use App\Models\Estimasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use DB;

class ApiController extends Controller
{
    public function tampilHalamanUtama()
    {
        $tipeproperti = Tipeproperti::all();
        $listing = Listing::where('status','Available')->orderBy('created_at','desc')->limit(10)->get();
        $primary = Primary::orderBy('idprimary','desc')->limit(5)->get();
        return response()->json(['message' => 'Success', 'tipeproperti' => $tipeproperti, 'listing'=> $listing, 'primary'=> $primary]);
    }

    public function addBookmark(Request $request){
        try{
            DB::table('bookmarks')->insert([
                'agen_idagen' => $request->get('idagen'),
                'listings_idlisting' => $request->get('idlisting')
            ]);
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menambah data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function deleteBookmark(Request $request){
        try{
            $idagen = $request->get('idagen');
            $idlisting = $request->get('idlisting');
            DB::table('bookmarks')->where('agen_idagen',$idagen)->where('listings_idlisting',$idlisting)->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }    
    

    // public function tampilHalamanListing($idagen)
    // {
    //     $listing = Listing::all();
    //     $bookmark = DB::table('bookmarks')->where('agen_idagen',$idagen)->get();
    //     return response()->json(['message' => 'Success', 'listing'=> $listing, 'bookmark'=>$bookmark]);
    // }

    public function tampilHalamanListing(Request $request)
    {
        $listing = Listing::query()->where('status','Available');
        
        if($request->get('cari') != ""){
            $listing = $listing->where('judul','LIKE','%'.$request->get('cari').'%');
        }
        if ($request->get('minharga') != 0 && $request->get('maxharga')!= 0) {
            $listing = $listing->where('harga', '>=', $request->get('minharga'))
                               ->where('harga', '<=', $request->get('maxharga'));
        }
        if ($request->get('minluastanah') != 0 && $request->get('maxluastanah') != 0) {
            $listing = $listing->where('luas_tanah', '>=', $request->get('minluastanah'))
                               ->where('luas_tanah', '<=', $request->get('maxluastanah'));
        }
        if ($request->get('minluasbangunan') != 0 && $request->get('maxluasbangunan') != 0) {
            $listing = $listing->where('luas_bangunan', '>=', $request->get('minluasbangunan'))
                               ->where('luas_bangunan', '<=', $request->get('maxluasbangunan'));
        }
        if ($request->get('kamartidur') != 0){
            if($request->get('kamartidur') >= 4){
                $listing = $listing->where('kamar_tidur','>=', 4);
            } else {
                $listing = $listing->where('kamar_tidur', $request->get('kamartidur'));
            }
        }
        if ($request->get('minkamarmandi') != 0){
            if($request->get('minkamarmandi') >= 3){
                $listing = $listing->where('kamar_mandi','>=', 3);
            } else {
                $listing = $listing->where('kamar_mandi', $request->get('minkamarmandi'));
            }
        }
        if ($request->get('mindimensi_tl') != 0){
            $listing = $listing->where('dimensi_tanah_lebar',">=",$request->get('mindimensi_tl'));
        }
        if ($request->get('mindimensi_tp') != 0){
            $listing = $listing->where('dimensi_tanah_panjang',">=",$request->get('mindimensi_tp'));
        }
        if ($request->get('jumlahlantai') != 0){
            if($request->get('jumlahlantai') >= 3){
                $listing = $listing->where('jumlah_lantai','>=', 3);
            } else {
                $listing = $listing->where('jumlah_lantai', $request->get('jumlahlantai'));
            }
        }
        if ($request->get('mincarport') != 0) {
            if($request->get('mincarport') >= 3){
                $listing = $listing->where('carport','>=', 3);
            } else {
                $listing = $listing->where('carport', $request->get('mincarport'));
            }
        }
        if ($request->get('minlantai') != 0 && $request->get('maxlantai')!= 0) {
            $listing = $listing->where('nomor_lantai', '>=', $request->get('minlantai'))
                               ->where('nomor_lantai', '<=', $request->get('maxlantai'));
        }
        if ($request->get('hadap') != "") {
            $listing = $listing->where('hadap', 'LIKE','%'.$request->get('hadap').'%');
        }
        if ($request->get('perabotan') != "") {
            $listing = $listing->where('perabotan', $request->get('perabotan'));
        }
        if ($request->get('posisi') != "") {
            $listing = $listing->where('posisi', $request->get('posisi'));
        }
        if ($request->get('jenissurat') != 0) {
            $listing = $listing->where('jenis_surat_idjenis_surat', $request->get('jenissurat'));
        }
        if ($request->get('tipeproperti') != 0) {
            $listing = $listing->where('tipe_properti_idtipe_properti', $request->get('tipeproperti'));
        }
        if ($request->get('jenislantai') != 0) {
            $listing = $listing->where('jenis_lantai_idjenis_lantai', $request->get('jenislantai'));
        }
        if ($request->get('tipeapartemen') != 0) {
            $listing = $listing->where('tipe_apartemens_idtipe_apartemen', $request->get('tipeapartemen'));
        }
        if ($request->get('jenislisting') != "") {
            $listing = $listing->where('jenis_listing', $request->get('jenislisting'));
        }
        if ($request->get('provinsi') != 0){
            if ($request->get('kota') != 0){
                if ($request->get('kecamatan') != 0){
                    if ($request->get('kelurahan') != 0){
                        $listing = $listing->where('kelurahans_idkelurahan', $request->get('kelurahan'));
                    } 
                    else {
                        $listing = $listing->join('kelurahans','listings.kelurahans_idkelurahan','=','kelurahans.idkelurahan')
                        ->join('kecamatans','kecamatans.idkecamatan','=','kelurahans.kecamatans_idkecamatan')
                        ->where('idkecamatan',$request->get('kecamatan'));
                    }
                } 
                else{
                    $listing = $listing->join('kelurahans','listings.kelurahans_idkelurahan','=','kelurahans.idkelurahan')
                    ->join('kecamatans','kecamatans.idkecamatan','=','kelurahans.kecamatans_idkecamatan')
                    ->join('kotas','kotas.idkota','=','kecamatans.kotas_idkota')
                    ->where('idkota',$request->get('kota'));
                }
            } 
            else {
                $listing = $listing->join('kelurahans','listings.kelurahans_idkelurahan','=','kelurahans.idkelurahan')
                ->join('kecamatans','kecamatans.idkecamatan','=','kelurahans.kecamatans_idkecamatan')
                ->join('kotas','kotas.idkota','=','kecamatans.kotas_idkota')
                ->join('provinsis','provinsis.idprovinsi','=','kotas.provinsis_idprovinsi')
                ->where('idprovinsi',$request->get('provinsi'));
            }
        }
        $listing = $listing->orderBy('idlisting','desc')->get();
        return response()->json(['message' => 'Success', 'listing'=> $listing]);
    }

    public function tampilListingTipeproperti($idtipeproperti){
        $listing = DB::table('listings')->where('tipe_properti_idtipe_properti',$idtipeproperti)->where('status','Available')->orderBy('idlisting','desc')->get();
        return response()->json(['message'=> 'Success', 'listing'=> $listing]);
    }

    public function tampilHalamanprofil($idagen){
        $calonpembeli = Calonpembeli::where('agen_idagen',$idagen)->count('idpelanggan');
        $listing = Listing::where('agen_idagen', $idagen)->count('idlisting');
        return response()->json(['message' => 'Success', 'calonpembeli' => $calonpembeli, 'listing'=>$listing]);
    }

    public function tampilHalamanListPrimary(){
        $primary = Primary::orderBy('idprimary','desc')->get();
        return response()->json(['message'=>'Success', 'primary'=>$primary]);
    }

    public function tampilDetailPrimary($idprimary){
        $primary = Primary::find($idprimary);
        $foto = DB::table('foto_primarys')->where('primarys_idprimary',$idprimary)->get();
        return response()->json(['message'=> 'Success', 'primary'=>$primary, 'foto'=>$foto]);
    }

    public function tampilMyListing($idagen){
        $listing = DB::table('listings')->where('agen_idagen', $idagen)->orderBy('idlisting','desc')->get();
        return response()->json(['message'=>"Success", 'listing'=>$listing]);
    }

    public function getProvinsi(){
        $provinsi = Provinsi::all();
        return response()->json(['message'=>"Success", 'provinsi'=>$provinsi]);
    }

    public function getKota($idprovinsi){
        $kota = DB::table('kotas')->where('provinsis_idprovinsi',$idprovinsi)->get();
        return response()->json(['message'=>"Success", 'kota'=>$kota]);
    }

    public function getKecamatan($idkota){
        $kecamatan = DB::table('kecamatans')->where('kotas_idkota',$idkota)->get();
        return response()->json(['message'=>"Success", 'kecamatan'=>$kecamatan]);
    }

    public function getKelurahan($idkecamatan){
        $kelurahan = DB::table('kelurahans')->where('kecamatans_idkecamatan',$idkecamatan)->get();
        return response()->json(['message'=>"Success", 'kelurahan'=>$kelurahan]);
    }

    public function getTipeproperti(){
        $tipeproperti = Tipeproperti::all();
        return response()->json(['message'=>"Success", 'tipeproperti'=>$tipeproperti]);
    }
    
    public function getTipeapartemen(){
        $tipeapartemen = Tipeapartemen::all();
        return response()->json(['message'=>"Success", 'tipeapartemen'=>$tipeapartemen]);
    }
    
    public function getLantai(){
        $lantai = Lantai::all();
        return response()->json(['message'=>"Success", 'lantai'=>$lantai]);
    }

    public function getBentukharga(){
        $bentukharga = Bentukharga::all();
        return response()->json(['message'=>"Success", 'bentukharga'=>$bentukharga]);
    }

    public function getJenissurat(){
        $jenissurat = Surat::all();
        return response()->json(['message'=>"Success", 'jenissurat'=>$jenissurat]);
    }

    public function getKpr($idagen){
        $kpr = Kpr::where('agen_idagen',$idagen)->orderBy('idkpr','desc')->get();
        return response()->json(['message'=>"Success", 'kpr'=>$kpr]);
    }

    public function getEstimasi($idagen){
        $estimasi = Estimasi::where('agens_idagen',$idagen)->orderBy('idestimasi','desc')->get();
        return response()->json(['message'=>"Success", 'estimasi'=>$estimasi]);
    }

    public function getCalonpembeli($idagen){
        $calonpembeli = Calonpembeli::where('agen_idagen',$idagen)->orderBy('idpelanggan','desc')->get();
        return response()->json(['message'=>"Success", 'calonpembeli'=>$calonpembeli]);
    }

    public function daftarCalonpembeli(Request $request){
        $calonpembeli = Calonpembeli::query();
        
        if($request->get('cari') != ""){
            $calonpembeli = $calonpembeli->where('keterangan','LIKE','%'.$request->get('cari').'%');
        }

        $calonpembeli = $calonpembeli->orderBy('idpelanggan','desc')
        ->join('agens','agens.idagen','=','calon_pembelis.agen_idagen')
        ->select('calon_pembelis.*', 'agens.whatsapp', 'agens.foto')->get();
        return response()->json(['message'=>"Success", 'calonpembeli'=>$calonpembeli]);
    }

    public function detailCalonPembeli($idcalonpembeli){
        $calonpembeli = Calonpembeli::find($idcalonpembeli);
        return response()->json(['message'=>'Success', 'calonpembeli'=>$calonpembeli]);
    }

    public function bookmark($idagen){
        $getidlisting = DB::table('bookmarks')->where('agen_idagen',$idagen)->get();
        $listing = [];
        foreach($getidlisting as $idl){
            $listing[] = Listing::find($idl->listings_idlisting);
        }
        return response()->json(['message'=>'Success', 'listing'=>$listing]);
    }

    public function tampilDetailListing($idagen, $kode){
        $listing = Listing::find($kode);
        $foto = DB::table('fotos')->where('listings_idlisting',$kode)->get();
        $jenislantai = $listing->lantais()->get();
        $kelurahan = $listing->kelurahans()->get();
        $agen = $listing->agens()->get();
        $bentukharga = $listing->bentukhargas()->get();
        $tipeapartemen = $listing->tipeapartemens()->get();
        $jenissurat = $listing->surats()->get();
        $tipeproperti = $listing->tipepropertis()->get();
        $bookmark = DB::table('bookmarks')->where('listings_idlisting',$kode)->where('agen_idagen',$idagen)->get();
        return response()->json(['message' => 'Success', 'listing'=> $listing, 'foto'=> $foto, 'lantai'=> $jenislantai, 'tipeproperti'=> $tipeproperti,
        'kelurahan'=> $kelurahan, 'jenissurat'=> $jenissurat, 'bentukharga'=> $bentukharga, 'tipeapartemen'=> $tipeapartemen, 'agen'=> $agen, 'bookmark'=>$bookmark]);
    }

    public function prosesLogin(Request $request)
    {
        $user = User::where('email',$request->email)->where('jabatan','!=','admin')->first();

        if($user != null)
        {
            $cekPassword = Hash::check($request->password, $user->password);
            if($cekPassword == true){
                return response()->json(['message' => 'Success', 'user'=> $user]);
            }
            else {
                return response()->json(['message' => 'Error']);
            }
        } else {
            return response()->json(['message' => 'Error']);
        }
    }

    public function clearKpr($idkpr){
        try{
            $kpr = Kpr::find($idkpr);
            $kpr->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function clearAllKpr($idagen){
        try{
            Kpr::where('agen_idagen',$idagen)->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function clearEstimasi($idestimasi){
        try{
            $estimasi = Estimasi::find($idestimasi);
            $estimasi->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function clearAllEstimasi($idagen){
        try{
            Estimasi::where('agens_idagen',$idagen)->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function addKpr(Request $request){
        try{
            $data = new Kpr();
            $data->tanggal = Carbon::today();
            $data->agen_idagen = $request->get('idagen');
            $data->catatan = $request->get('catatan');
            $data->nominal_pinjaman = $request->get('nominalPinjaman');
            $data->suku_bunga = $request->get('sukuBunga');
            $data->waktu_pinjaman = $request->get('waktuPinjaman');
            $data->cicilan = $request->get('cicilan');
            $data->save();
            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menambah data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function addEstimasi(Request $request){
        try{
            $data = new Estimasi();
            $data->tanggal = Carbon::today();
            $data->agens_idagen = $request->get('idagen');
            $data->catatan = $request->get('catatan');
            $data->harga_jual = $request->get('hargaJual');
            $data->komisi = $request->get('komisi');
            $data->biaya_notaris = $request->get('biayaNotaris');
            $data->total = $request->get('total');
            $data->save();
            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menambah data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function addCalonPembeli(Request $request){
        try{
            $data = new Calonpembeli();
            $data->agen_idagen = $request->get('idagen');
            $data->nama = $request->get('nama');
            $data->hp = $request->get('hp');
            $data->keterangan = $request->get('keterangan');
            $data->save();
            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menambah data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function deleteCalonPembeli($idcalonpembeli){
        try{
            Calonpembeli::where('idpelanggan',$idcalonpembeli)->delete();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function updateCalonPembeli(Request $request){
        try{
            $idpelanggan = $request->get('idpelanggan');
            $cp = Calonpembeli::find($idpelanggan);
            $cp->nama = $request->get('nama');
            $cp->hp = $request->get('hp');
            $cp->keterangan = $request->get('keterangan');
            $cp->save();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function getProfil($idagen){
        $agen = User::find($idagen);
        return response()->json(['message'=>"Success", 'agen'=>$agen]);
    }

    public function updateProfil(Request $request){
        try{
            $idagen = $request->get('idagen');
            $agen = User::find($idagen);
            $agen->nama = $request->get('nama');
            $agen->hp = $request->get('hp');
            $agen->alamat = $request->get('alamat');
            $agen->agama = $request->get('agama');
            if($request->get('password') != ""){
                $agen->password = Hash::make($request->get('password'));
            }
            $agen->whatsapp = $request->get('whatsapp');
            $agen->save();
            return response()->json(['message'=>'Success']);
        } catch (\PDOException $e){
            $msg = "Gagal menghapus data";
            return response()->json(['message' => 'Error'.$msg]);
        }
    }

    public function updateListing(Request $request){
        try{
            $idlisting = $request->get('idlisting');

            $listing = Listing::find($idlisting);
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
            if($request->get('idbh') != '0'){
                $listing->bentuk_harga_idbentuk_harga = $request->get('idbh');
            }
            if($request->get('idjs') != '0'){
                $listing->jenis_surat_idjenis_surat = $request->get('idjs');
            }
            if($request->get('idtp') != '0'){
                $listing->tipe_properti_idtipe_properti = $request->get('idtp');
            }
            if($request->get('idjl') != '0'){
                $listing->jenis_lantai_idjenis_lantai = $request->get('idjl');
            }
            $listing->catatan = $request->get('catatan');
            $listing->jenis_listing = $request->get('jenislisting');
            $listing->judul = $request->get('judul');

            if($request->hasFile('fotoutama')){
                if(Foto::where('path',$listing->foto_utama)->first() != ''){
                    $fotoLama = Foto::where('path',$listing->foto_utama)->delete();
                }
                $dest='public/images/listing/'.$listing->foto_utama;
                if(file_exists($dest)){
                    @unlink($dest); 
                }
                $file=$request->file('fotoutama');
                $imgFolder='public/images/listing/';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $listing->foto_utama=$imgFile;

                $foto = new Foto();
                $foto->listings_idlisting = $idlisting;
                $foto->path=$imgFile;
                $foto->save();
            }
            $listing->save();
            
            return response()->json(['message' => 'Success']);        
        }
        catch(\PDOException $e){
            return response()->json(['message' => 'Error']);
        }
    }   

    public function getMultiFoto($idlisting){
        $foto = Foto::where('listings_idlisting',$idlisting)->get();
        return response()->json(['message'=>'Success', 'foto'=>$foto]);
    }

    public function deleteFotoListing(Request $request){
        try{
            $idlisting = $request->get('idlisting');
            $fotoutama = Listing::where('idlisting',$idlisting)->select('foto_utama')->get();
            
            $foto = Foto::where('listings_idlisting',$idlisting)->get();
            foreach($foto as $f){
                if($fotoutama[0]->foto_utama != $f->path){
                    // dd($fotoutama[0]->foto_utama." | ".$f->path);
                    if(File::exists('public/images/listing/'.$f->path)){
                        File::delete('public/images/listing/'.$f->path);
                        $f->delete();
                    }
                }
            }
            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            return response()->json(['message' => 'Error']);
        }
        
    }

    public function addFotoListing(Request $request){
        try{
            $idlisting = $request->get('idlisting');
            $file = $request->file('foto');

            $foto = new Foto();
            
            $foto->listings_idlisting = $idlisting;
            $imgFolder='public/images/listing';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $foto->path=$imgFile;
            $foto->save();

            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            return response()->json(['message' => 'Error']);
        }
    }

    public function deleteListing(Request $request){
        try{
            $idlisting = $request->get('idlisting');
            $listing = Listing::find($idlisting);
            $foto = DB::table('fotos')->where('listings_idlisting', $idlisting)->delete();
            $bookmark = DB::table('bookmarks')->where('listings_idlisting', $idlisting)->delete();
            $listing->delete();
            return response()->json(['message' => 'Success']);
        } catch (\PDOException $e){
            return response()->json(['message' => 'Error']);
        }
    }

    public function addListing(Request $request){
        try{
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
            if($request->get('idbh') != 0){
                $data->bentuk_harga_idbentuk_harga = $request->get('idbh');
            }
            $data->jenis_surat_idjenis_surat = $request->get('idjs');
            $data->tipe_properti_idtipe_properti = $request->get('idtp');
            if($request->get('idjl') != 0){
                $data->jenis_lantai_idjenis_lantai = $request->get('idjl');
            }
            $data->kelurahans_idkelurahan = $request->get('kelurahan');
            $data->catatan = $request->get('catatan');
            $data->status = 'Available';
            $data->jenis_listing = $request->get('jenislisting');
            $data->judul = $request->get('judul');
            if($request->hasFile('fotoutama')){
                $file=$request->file('fotoutama');
                $imgFolder='public/images/listing';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $data->foto_utama=$imgFile;
            }
            $data->save();
            $idlisting = $data->idlisting;

            if($request->hasFile('fotoutama')){
                $foto = new Foto();
                $foto->listings_idlisting = $idlisting;
                $foto->path=$imgFile;
                $foto->save();
            }
            
            return response()->json(['message' => 'Success', 'idlisting'=>$idlisting]);        
        }
        catch(\PDOException $e){
            return response()->json(['message' => 'Error', 'pesan'=>$e]);
        }
    }

    public function tampilLaporan(Request $request)
    {
        $jumListingSold = Listing::where('agen_idagen',$request->get('idagen'))->where('status','Sold')->count('idlisting');
        
        $laporanPrimary = Reminder::where('agens_idagen',$request->get('idagen'))->get();
        $jumPrimarySold = $laporanPrimary->count('idreminder');
        $komisiPrimary = Reminder::where('agens_idagen',$request->get('idagen'))->sum('total_komisi');
        $laporanPemilik = Laporan::where('agens_pemilik',$request->get('idagen'))->sum('komisi_agen_pemilik');
        $laporanPenjual = Laporan::where('agens_penjual',$request->get('idagen'))->sum('komisi_agen_penjual');

        $komisiListing = $laporanPemilik + $laporanPenjual;
        return response()->json(['message' => 'Success', 'komisiListing'=> $komisiListing, 'komisiPrimary'=>$komisiPrimary,
        'jumListingSold'=>$jumListingSold,'jumPrimarySold'=>$jumPrimarySold]);
    }

    public function detailLaporan(Request $request)
    {
        $tglAwal = $request->get('tanggalAwal');
        $tglAkhir = $request->get('tanggalAkhir');
        $agen = $request->get('idagen');
        $laporan = DB::select(DB::raw('
        select laporans.*,  pemi.nama  as agenPemilik, penj.nama as agenPenjual, listings.kode_listing as kodeListing from laporans inner join listings on laporans.listings_idlisting = listings.idlisting inner join agens as pemi on laporans.agens_pemilik = pemi.idagen inner join agens as penj on laporans.agens_penjual = penj.idagen where (tanggal_deal >= "'.$tglAwal.'" and tanggal_deal <= "'. $tglAkhir.'") and (agens_pemilik = '.$agen.' or agens_penjual = '.$agen.')'));
        
        return response()->json(['message' => 'Success', 'laporan'=> $laporan]);
    }

}

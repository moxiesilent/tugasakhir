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
use App\Models\Kpr;
use App\Models\Estimasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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

    public function tampilListingTipeproperti($idtipeproperti){
        $listing = DB::table('listings')->where('tipe_properti_idtipe_properti',$idtipeproperti)->get();
        return response()->json(['message'=> 'Success', 'listing'=> $listing]);
    }

    public function tampilHalamanprofil(){
        $agen = DB::table('agens')->where('email')->value('');
        return response()->json(['message' => 'Success', 'agen' => $agen]);
    }

    public function tampilHalamanListPrimary(){
        $primary = Primary::all();
        return response()->json(['message'=>'Success', 'primary'=>$primary]);
    }

    public function tampilDetailPrimary($idprimary){
        $primary = Primary::find($idprimary);
        $foto = DB::table('foto_primarys')->where('primarys_idprimary',$idprimary)->get();
        return response()->json(['message'=> 'Success', 'primary'=>$primary, 'foto'=>$foto]);
    }

    public function tampilMyListing($idagen){
        $listing = DB::table('listings')->where('agen_idagen', $idagen)->get();
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
        $estimasi = Estimasi::where('agens_idagen',$idagen)->orderBy('idkpr','desc')->get();
        return response()->json(['message'=>"Success", 'estimasi'=>$estimasi]);
    }

    public function tampilDetailListing($kode){
        $listing = Listing::find($kode);
        $foto = DB::table('fotos')->where('listing_kode_listing',$kode)->get();
        $jenislantai = $listing->lantais()->get();
        $kelurahan = $listing->kelurahans()->get();
        $agen = $listing->agens()->get();
        $bentukharga = $listing->bentukhargas()->get();
        $tipeapartemen = $listing->tipeapartemens()->get();
        $jenissurat = $listing->surats()->get();
        $tipeproperti = $listing->tipepropertis()->get();
        return response()->json(['message' => 'Success', 'listing'=> $listing, 'foto'=> $foto, 'lantai'=> $jenislantai, 'tipeproperti'=> $tipeproperti,
        'kelurahan'=> $kelurahan, 'jenissurat'=> $jenissurat, 'bentukharga'=> $bentukharga, 'tipeapartemen'=> $tipeapartemen, 'agen'=> $agen]);
    }

    public function prosesLogin(Request $request)
    {
        $user = User::where('email',$request->email)->first();

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
            $data->agen_idagen = $request->get('idagen');
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
            
            return response()->json(['message' => 'Success']);        
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return response()->json(['message' => 'Error '. $msg]);
        }
    }   

}

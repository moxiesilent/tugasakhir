<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Listing;
use App\Models\Reminder;
use App\Models\Calonpembeli;
use Illuminate\Support\Facades\Hash;

class AgenController extends Controller
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
        $data = User::all();
        return view('agen.index',compact('data'));
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
        return view("agen.create");
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
        try{
            $data = new User();
        
            if($request->hasFile('foto')){
                $file=$request->file('foto');
                $imgFolder='public/images/agen/';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $data->foto=$imgFile;
            }

            $data->kode = $request->get('kode');
            $data->nama = $request->get('nama');
            $data->email = $request->get('email');
            $data->tanggallahir = $request->get('tanggallahir');
            $data->jabatan = $request->get('jabatan');
            $data->password = Hash::make('12345678');
            $data->jenis_kelamin = $request->get('jeniskelamin');
            $data->hp = $request->get('hp');
            $data->alamat = $request->get('alamat');
            $data->agama = $request->get('agama');
            $data->whatsapp = $request->get('whatsapp');
            $data->save();

            return redirect()->route('agens.index')->with('status','data agen baru berhasil ditambahkan');
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data. ";
            return redirect()->route('agens.index')->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(User $agen)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $agen;
        $laporan = Laporan::where('agens_pemilik',$agen->idagen)->orWhere('agens_penjual',$agen->idagen)->get();
        $cp = Calonpembeli::where('agen_idagen',$agen->idagen)->count('idpelanggan');
        $komisiPrimary = Reminder::where('agens_idagen',$agen->idagen)->sum('total_komisi');
        $laporanPrimary = Reminder::where('agens_idagen',$agen->idagen)->get();
        $totalListing = Listing::where('agen_idagen',$agen->idagen)->count('idlisting');
        $laporanPemilik = Laporan::where('agens_pemilik',$agen->idagen)->sum('komisi_agen_pemilik');
        $laporanPenjual = Laporan::where('agens_penjual',$agen->idagen)->sum('komisi_agen_penjual');
        $totalKomisi = $laporanPemilik + $laporanPenjual + $komisiPrimary;
        return view("agen.show",compact('data','totalKomisi','cp','totalListing','laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(User $agen)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $agen;
        return view("agen.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $agen)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            if($request->hasFile('foto')){
                $dest='public/images/agen/'.$agen->foto;
                if(file_exists($dest)){
                    @unlink($dest); 
                }
                $file=$request->file('foto');
                $imgFolder='public/images/agen/';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $agen->foto=$imgFile;
            }
            if($request->get('password') != null){
                $pass = $request->get('password');
                $pass2 = $request->get('password2');
                if($pass != $pass2){
                    $msg ="Gagal mengubah data. Password baru yang dimasukkan tidak sesuai";
                    return redirect()->route('agens.index')->with('error', $msg);
                }
                else{
                    $agen->password = Hash::make($pass);
                }
            }
            $agen->kode = $request->get('kode');
            $agen->nama = $request->get('nama');
            $agen->email = $request->get('email');
            $agen->tanggallahir = $request->get('tanggallahir');
            $agen->jabatan = $request->get('jabatan');
            $agen->hp = $request->get('hp');
            $agen->alamat = $request->get('alamat');
            $agen->agama = $request->get('agama');
            $agen->whatsapp = $request->get('whatsapp');
            $agen->save();
            return redirect()->route('agens.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data. ";
            return redirect()->route('agens.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $agen)
    {
        //
    }

    public function hapusagen(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $agen = User::find($request->id);
            $agen->delete();
            return response()->json(['message'=>'success']);       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return response()->json(['message'=>'error']);
        }
    }

    public function resetpassword(Request $request){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $agen = User::find($request->id);
            $agen->password = Hash::make('12345678');
            $agen->save();
            return redirect('agens/'.$request->id)->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect('agens/'.$request->id)->with('error', $msg);
        }
    }

    public function detailLaporan($id){
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $agen = User::find($id);
        $laporanListing = Laporan::where('agens_pemilik',$id)->orWhere('agens_penjual',$id)->get();
        $laporanPrimary = Reminder::where('agens_idagen',$id)->get();
        $komisiPrimary = Reminder::where('agens_idagen',$id)->sum('total_komisi');
        $laporanPemilik = Laporan::where('agens_pemilik',$id)->sum('komisi_agen_pemilik');
        $laporanPenjual = Laporan::where('agens_penjual',$id)->sum('komisi_agen_penjual');
        $komisiListing = $laporanPemilik + $laporanPenjual;
        return view("agen.laporan",compact('laporanListing','laporanPrimary','komisiPrimary','komisiListing','agen'));
    }
}

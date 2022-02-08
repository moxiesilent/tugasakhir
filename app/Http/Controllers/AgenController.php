<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
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
        $data = new User();
        
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $imgFolder='images/agen/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $data->foto=$imgFile;
        }

        $data->kode = $request->get('kode');
        $data->name = $request->get('nama');
        $data->email = $request->get('email');
        $data->tanggallahir = $request->get('tanggallahir');
        $data->jabatan = $request->get('jabatan');
        $data->password = Hash::make('12345678');
        $data->jenis_kelamin = $request->get('jeniskelamin');
        $data->hp = $request->get('hp');
        $data->alamat = $request->get('alamat');
        $data->agama = $request->get('agama');
        $data->save();

        return redirect()->route('agens.index')->with('status','data agen baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(User $agen)
    {
        $data = $agen;
        return view("agen.show",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(User $agen)
    {
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
        try{
            if($request->hasFile('foto')){
                $dest='images/agen/'.$agen->foto;
                if(file_exists($dest)){
                    @unlink($dest); 
                }
                $file=$request->file('foto');
                $imgFolder='images/agen/';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $agen->foto=$imgFile;
            }
            $agen->nama_project = $request->get('namaproject');
            $agen->developer = $request->get('developer');
            $agen->blt = $request->get('blt');
            $agen->komisi = $request->get('komisi');
            $agen->keterangan = $request->get('keterangan');
            $agen->save();
            return redirect()->route('agens.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
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
        try{
            $agen = User::find($request->id);
            $agen->delete();
            return redirect()->route('agens.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('agens.index')->with('error', $msg);
        }
    }
}

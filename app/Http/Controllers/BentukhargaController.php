<?php

namespace App\Http\Controllers;

use App\Models\Bentukharga;
use Illuminate\Http\Request;
use DB;

class BentukhargaController extends Controller
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
        $data = Bentukharga::all();
        return view('bentukharga.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = new Bentukharga();
        $data->bentuk_harga = $request->get('bentukharga');
        $data->save();
        return redirect()->route('bentukhargas.index')->with('status','data baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bentukharga  $bentukharga
     * @return \Illuminate\Http\Response
     */
    public function show(Bentukharga $bentukharga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bentukharga  $bentukharga
     * @return \Illuminate\Http\Response
     */
    public function edit(Bentukharga $bentukharga)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $bentukharga;
        return view("bentukharga.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bentukharga  $bentukharga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bentukharga $bentukharga)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $bentukharga->bentuk_harga = $request->get('bentukharga');
            $bentukharga->save();
            return redirect()->route('bentukhargas.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('bentukhargas.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bentukharga  $bentukharga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bentukharga $bentukharga)
    {
        
    }

    public function hapusbentukharga(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $bentukharga = Bentukharga::find($request->id);
            $bentukharga->delete();
            return redirect()->route('bentukhargas.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('bentukhargas.index')->with('error', $msg);
        }
    }
}

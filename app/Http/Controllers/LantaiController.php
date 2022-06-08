<?php

namespace App\Http\Controllers;

use App\Models\Lantai;
use Illuminate\Http\Request;
use DB;

class LantaiController extends Controller
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
        $data = Lantai::all();
        return view('lantai.index',compact('data'));
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
        $data = new Lantai();
        $data->nama = $request->get('jenislantai');
        $data->save();
        return redirect()->route('lantais.index')->with('status','data baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lantai  $lantai
     * @return \Illuminate\Http\Response
     */
    public function show(Lantai $lantai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lantai  $lantai
     * @return \Illuminate\Http\Response
     */
    public function edit(Lantai $lantai)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $lantai;
        return view("lantai.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lantai  $lantai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lantai $lantai)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $lantai->nama = $request->get('jenislantai');
            $lantai->save();
            return redirect()->route('lantais.index')->with('status','data lantai berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('lantais.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lantai  $lantai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lantai $lantai)
    {

    }

    public function hapuslantai(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $lantai = Lantai::find($request->id);
            $lantai->delete();
            return redirect()->route('lantais.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('lantais.index')->with('error', $msg);
        }
    }
}

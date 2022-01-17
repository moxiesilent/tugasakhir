<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use DB;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Surat::all();
        return view('surat.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Surat();
        $data->jenis_surat = $request->get('jenissurat');
        $data->save();
        return redirect()->route('surats.index')->with('status','data baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        $data = $surat;
        return view("surat.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        try{
            $surat->jenis_surat = $request->get('jenissurat');
            $surat->save();
            return redirect()->route('surats.index')->with('status','data surat berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('surats.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        try{
            $surat->delete();
            return redirect()->route('surats.index')->with('status','data surat berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('surats.index')->with('error', $msg);
        }
    }
}

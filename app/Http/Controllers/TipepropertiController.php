<?php

namespace App\Http\Controllers;

use App\Models\Tipeproperti;
use Illuminate\Http\Request;
use DB;

class TipepropertiController extends Controller
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
        $data = Tipeproperti::all();
        return view('tipeproperti.index',compact('data'));
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
        try{
            $data = new Tipeproperti();
            $data->jenis_properti = $request->get('jenisproperti');
            $data->save();
            return redirect()->route('tipepropertis.index')->with('status','data baru telah ditambahkan');
        }
        catch(\PDOException $e){
            $msg ="Gagal menyimpan data.";
            return redirect()->route('tipepropertis.index')->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipeproperti  $tipeproperti
     * @return \Illuminate\Http\Response
     */
    public function show(Tipeproperti $tipeproperti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipeproperti  $tipeproperti
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipeproperti $tipeproperti)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $tipeproperti;
        return view("tipeproperti.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipeproperti  $tipeproperti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipeproperti $tipeproperti)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $tipeproperti->jenis_properti = $request->get('jenisproperti');
            $tipeproperti->save();
            return redirect()->route('tipepropertis.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return response()->json(['error' => 'Error'.$msg]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipeproperti  $tipeproperti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipeproperti $tipeproperti)
    {
        
    }

    public function hapustipeproperti(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $tipeproperti = Tipeproperti::find($request->id);
            $tipeproperti->delete();
            return redirect()->route('tipepropertis.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('tipepropertis.index')->with('error', $msg);
        }
    }
}

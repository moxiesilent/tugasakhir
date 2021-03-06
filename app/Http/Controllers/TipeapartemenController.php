<?php

namespace App\Http\Controllers;

use App\Models\Tipeapartemen;
use Illuminate\Http\Request;
use DB;

class TipeapartemenController extends Controller
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
        $data = Tipeapartemen::all();
        return view('tipeapartemen.index',compact('data'));
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
            $data = new Tipeapartemen();
            $data->tipe_apartemen = $request->get('tipeapartemen');
            $data->save();
            return redirect()->route('tipeapartemens.index')->with('status','data baru telah ditambahkan');
        }
        catch(\PDOException $e){
            $msg ="Gagal menyimpan data.";
            return redirect()->route('tipeapartemens.index')->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipeapartemen  $tipeapartemen
     * @return \Illuminate\Http\Response
     */
    public function show(Tipeapartemen $tipeapartemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipeapartemen  $tipeapartemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipeapartemen $tipeapartemen)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $tipeapartemen;
        return view("tipeapartemen.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipeapartemen  $tipeapartemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipeapartemen $tipeapartemen)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $tipeapartemen->tipe_apartemen = $request->get('tipeapartemen');
            $tipeapartemen->save();
            return redirect()->route('tipeapartemens.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('tipeapartemens.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipeapartemen  $tipeapartemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipeapartemen $tipeapartemen)
    {
        //
    }

    public function hapustipeapartemen(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $tipeapartemen = Tipeapartemen::find($request->id);
            $tipeapartemen->delete();
            return response()->json(['message'=>'success']);       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return response()->json(['message'=>'error']);
        }
    }
}

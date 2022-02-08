<?php

namespace App\Http\Controllers;

use App\Models\Primary;
use Illuminate\Http\Request;
use Illuminate\Facade\File;
use DB;

class PrimaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Primary::all();
        return view('primary.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("primary.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        try{
            $data = new Primary();

            if($request->hasFile('foto')){
                $file=$request->file('foto');
                $imgFolder='images/primary';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $data->foto=$imgFile;
            }
            $data->nama_project = $request->get('namaproject');
            $data->developer = $request->get('developer');
            $data->blt = $request->get('blt');
            $data->komisi = $request->get('komisi');
            $data->keterangan = $request->get('keterangan');
            $data->save();
            return redirect()->route('primarys.index')->with('status','data baru telah ditambahkan');     
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return redirect()->route('primarys.index')->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Primary  $primary
     * @return \Illuminate\Http\Response
     */
    public function show(Primary $primary)
    {
        $data = $primary;
        return view("primary.show",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Primary  $primary
     * @return \Illuminate\Http\Response
     */
    public function edit(Primary $primary)
    {
        $data = $primary;
        return view("primary.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Primary  $primary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Primary $primary)
    {
        try{
            if($request->hasFile('foto')){
                $dest='images/primary/'.$primary->foto;
                if(file_exists($dest)){
                    @unlink($dest); 
                }
                $file=$request->file('foto');
                $imgFolder='images/primary/';
                $imgFile=time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder,$imgFile);
                $primary->foto=$imgFile;
            }
            $primary->nama_project = $request->get('namaproject');
            $primary->developer = $request->get('developer');
            $primary->blt = $request->get('blt');
            $primary->komisi = $request->get('komisi');
            $primary->keterangan = $request->get('keterangan');
            $primary->save();
            return redirect()->route('primarys.index')->with('status','data berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return redirect()->route('primarys.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Primary  $primary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Primary $primary)
    {
        //
    }
    public function hapusprimary(Request $request)
    {
        try{
            $primary = Primary::find($request->id);
            $primary->delete();
            return redirect()->route('primarys.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('primarys.index')->with('error', $msg);
        }
    }
}

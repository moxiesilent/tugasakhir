<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use DB;

class LaporanController extends Controller
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
        $data = Laporan::all();
        $agen = User::all();
        $listing = Listing::where('status','Available')->orderBy('kode_listing')->get();
        // dd($data[0]->listings);
        return view('laporan.index',compact('data','agen','listing'));
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
            if($request->get('agenPemilik') != null || $request->get('agenPenjual') != null){
                $listing = Listing::where('idlisting',$request->get('listing'))->get();
                $komisi = $listing->komisi;
                $data = new Laporan();
                $data->listings_idlisting = $request->get('listing');
                $data->agens_pemilik = $request->get('agenPemilik');
                $data->agens_penjual = $request->get('agenPenjual');
                $data->tanggal_deal = $request->get('tanggal');
                if($request->get('agenPemilik') != null){
                    $data->komisi_agen_pemilik = $request->get('hargaJual') * $komisi / 100 * 25 / 100;
                }
                if($request->get('agenPenjual') != null){
                    $data->komisi_agen_penjual = $request->get('hargaJual') * $komisi / 100 * 25 / 100;
                }
                $data->harga_jual = $request->get('hargaJual');
                $data->nama_pembeli = $request->get('namaPembeli');
                $data->nama_notaris = $request->get('namaNotaris');
                $data->dp = $request->get('dp');
                $data->keterangan = $request->get('keterangan');
                $data->save();

                if($request->get('listing') != null){
                    $listing = Listing::find($request->get('listing'));
                    $listing->status = 'Sold';
                    $listing->save();

                    DB::table('bookmarks')->where('listings_idlisting', $request->get('listing'))->delete();
                }

                return redirect()->route('laporans.index')->with('status','laporan baru telah ditambahkan'); 
            } else{
                return redirect()->route('laporans.index')->with('error', "Pemilik atau penjual listing harus dari kantor Xavier Marks Tjandra Grande");
            }
        }
        catch(\PDOException $e){
            $msg ="Gagal menyimpan data.";
            return redirect()->route('laporans.index')->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $laporan;
        return view("laporan.show",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        $data = $laporan;
        $agen = User::all();
        return view("laporan.edit",compact('data','agen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            if($request->get('agenPemilik') != null || $request->get('agenPenjual') != null){
                $laporan->agens_pemilik = $request->get('agenPemilik');
                $laporan->agens_penjual = $request->get('agenPenjual');
                $laporan->tanggal_deal = $request->get('tanggal');
                $laporan->komisi_agen_pemilik = $request->get('komisiPemilik');
                $laporan->komisi_agen_penjual = $request->get('komisiPenjual');
                $laporan->harga_jual = $request->get('hargaJual');
                $laporan->nama_pembeli = $request->get('namaPembeli');
                $laporan->nama_notaris = $request->get('namaNotaris');
                $laporan->dp = $request->get('dp');
                $laporan->keterangan = $request->get('keterangan');
                $laporan->save();

                return redirect()->route('laporans.index')->with('status','laporan baru telah ditambahkan'); 
            } else{
                return redirect()->route('laporans.index')->with('error', "Pemilik atau penjual listing harus dari kantor Xavier Marks Tjandra Grande");
            }    
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return redirect()->route('laporans.index')->with('error', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function hapuslaporan(Request $request)
    {
        if(auth()->user()->jabatan != 'admin'){
            abort(403);
        }
        try{
            $laporan = Laporan::find($request->id);
            $listing = Listing::where('idlisting', $laporan->listings_idlisting);
            $listing->status = 'Available';
            $listing->save();
            $laporan->delete();
            return response()->json(['message'=>'success']);       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return response()->json(['message'=>'error']);
        }
    }
}

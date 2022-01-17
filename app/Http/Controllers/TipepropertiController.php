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
        $data = new Tipeproperti();
        $data->jenis_properti = $request->get('jenisproperti');
        $data->save();
        return redirect()->route('tipepropertis.index')->with('status','data baru telah ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipeproperti  $tipeproperti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipeproperti $tipeproperti)
    {
        //
    }
}

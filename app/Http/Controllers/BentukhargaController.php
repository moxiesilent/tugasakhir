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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bentukharga  $bentukharga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bentukharga $bentukharga)
    {
        //
    }
}

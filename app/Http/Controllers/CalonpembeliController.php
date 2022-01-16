<?php

namespace App\Http\Controllers;

use App\Models\Calonpembeli;
use Illuminate\Http\Request;
use DB;

class CalonpembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Calonpembeli::all();
        return view('calonpembeli.index',compact('data'));
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
     * @param  \App\Models\Calonpembeli  $calonpembeli
     * @return \Illuminate\Http\Response
     */
    public function show(Calonpembeli $calonpembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calonpembeli  $calonpembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Calonpembeli $calonpembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calonpembeli  $calonpembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calonpembeli $calonpembeli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calonpembeli  $calonpembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calonpembeli $calonpembeli)
    {
        //
    }
}

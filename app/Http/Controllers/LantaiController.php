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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lantai  $lantai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lantai $lantai)
    {
        //
    }
}

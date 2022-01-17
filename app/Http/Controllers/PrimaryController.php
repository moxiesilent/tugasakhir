<?php

namespace App\Http\Controllers;

use App\Models\Primary;
use Illuminate\Http\Request;
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
     * @param  \App\Models\Primary  $primary
     * @return \Illuminate\Http\Response
     */
    public function show(Primary $primary)
    {
        //
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
        //
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
}

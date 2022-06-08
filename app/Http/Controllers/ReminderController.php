<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\User;
use App\Models\Primary;
use Illuminate\Http\Request;
use DB;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Reminder::all();
        $agen = User::all();
        $primary = Primary::all();
        return view('reminder.index',compact('data','agen','primary'));
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
        try{
            $data = new Reminder();
            $data->agens_idagen = $request->get('agen');
            $data->primarys_idprimary = $request->get('primary');
            $data->tanggal = $request->get('tanggal');
            $data->total_komisi = $request->get('komisi');
            $data->keterangan = $request->get('keterangan');
            $data->save();
            return redirect()->route('reminders.index')->with('status','data baru telah ditambahkan'); 
        }
        catch(\PDOException $e){
            $msg ="Gagal menyimpan data.";
            return redirect()->route('reminders.index')->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        $data = $reminder;
        $agen = User::all();
        $primary = Primary::all();
        return view("reminder.edit",compact('data','agen','primary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        try{
            $reminder->agens_idagen = $request->get('agen');
            $reminder->primarys_idprimary = $request->get('primary');
            $reminder->tanggal = $request->get('tanggal');
            $reminder->total_komisi = $request->get('komisi');
            $reminder->keterangan = $request->get('keterangan');
            $reminder->save();
            return redirect()->route('reminders.index')->with('status','data reminder berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('reminders.index')->with('error', $msg);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        
    }

    public function hapusreminder(Request $request)
    {
        try{
            $reminder = Reminder::find($request->idreminder);
            $reminder->delete();
            return redirect()->route('reminders.index')->with('status','data berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('reminders.index')->with('error', $msg);
        }
    }
}

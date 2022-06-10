<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\Primary;
use App\Models\Reminder;
use App\Models\Calonpembeli;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function laporan(){
        $listing = Listing::count('idlisting');
        $user = User::count('idagen');
        $terjual = Listing::where('status','sold')->count();
        $listingpending = Listing::where('status','pending')->count();
        $calonpembeli = Calonpembeli::count('idpelanggan');
        $primary = Primary::count('idprimary');
        $hariIni = Carbon::today();
        $satuMinggu = $hariIni->addDays(7);
        $reminder = Reminder::where('tanggal','>=',$hariIni)->where('tanggal','<=',$satuMinggu)->get();
        return view('index',compact('listing','user','terjual','primary','reminder','listingpending','calonpembeli'));
    }

    public function bukanAdmin(){
        abort(403);
    }
}

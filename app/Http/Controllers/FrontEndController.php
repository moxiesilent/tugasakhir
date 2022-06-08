<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use DB;

class FrontEndController extends Controller
{
    public function viewFrontEnd($id){
        $listing = Listing::find($id);
        $foto = DB::table('fotos')->where('listings_idlisting',$id)->get();
        return view("front.index",compact('listing','foto'));
    }
}

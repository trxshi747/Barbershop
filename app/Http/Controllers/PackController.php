<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack\Pack;

class PackController extends Controller
{
    public function our_packs()
    {
        $packs = Pack::select()->orderBy('id','asc')->get();
    
        return view('packs',compact('packs'));
    }
}

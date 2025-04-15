<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RDVPController extends Controller
{
    public function index(){
        return view('admin.RDVP.create');
    }

    public function manage(){
        return view('admin.RDVP.manage');
    }
}

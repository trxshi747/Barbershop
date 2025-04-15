<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    public function index(){
        return view('admin.forfait.create');
    }

    public function manage(){
        return view('admin.forfait.manage');
    }
}

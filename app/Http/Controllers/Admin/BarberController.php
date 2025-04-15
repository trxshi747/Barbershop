<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index(){
        return view('admin.barber.create');
    }

    public function manage(){
        return view('admin.barber.manage');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarberMainController extends Controller
{
    public function index(){
        return view('barber.dashboard');
    }
}

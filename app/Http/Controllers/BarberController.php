<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarberController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        return view('barber.dashboard');
    }
}

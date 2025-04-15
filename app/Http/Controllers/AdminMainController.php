<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function order_history()
    {
        return view('admin.order.history');
    }

    public function settings()
    {
        return view('admin.settings.settings');
    }
}

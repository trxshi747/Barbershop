<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service\Service;

class ServiceController extends Controller
{
    public function our_services()
    {
        $services = [
            'Men' => Service::where('section', 'Men')->orderBy('id', 'asc')->get(),
            'Kids' => Service::where('section', 'Kids')->orderBy('id', 'asc')->get(),
            'Coloring Style' => Service::where('section', 'Coloring Style')->orderBy('id', 'asc')->get(),
            'Hair Removal' => Service::where('section', 'Hair Removal')->orderBy('id', 'asc')->get(),
            'Smoothing And Hair Care' => Service::where('section', 'Smoothing And Hair Care')->orderBy('id', 'asc')->get(),
            'Facial Treatments' => Service::where('section', 'Facial Treatments')->orderBy('id', 'asc')->get()
        ];
        return view('services', compact('services'));
    }


}

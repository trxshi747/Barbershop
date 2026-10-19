<?php

namespace App\Http\Controllers;
use App\Models\Service\Service;
use App\Models\Booking\Booking;
use App\Models\User;
USE App\Models\Coiffeur;
//use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AdminBookingController extends Controller
{  
    public function create()
    {
    $Coiffeur = Coiffeur::all();    
    $users = User::all();
    $services = Service::all();
    return view('admins.bookings.create', compact('users', 'services','Coiffeur'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'coiffeur_id' => 'required|exists:coiffeurs,id',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'services' => 'required|array|min:1',
        'services.*' => 'exists:services,id'
    ]);

    $services = Service::findMany($validated['services']);
    $totalDuration = $services->sum('duration');
    $totalPrice = $services->sum('price');

    $booking = Booking::create([
        'user_id' => $validated['user_id'],
        
        'date' => $validated['date'],
        'time' => $validated['time'],
        'duration' => $totalDuration,
        'price' => $totalPrice
    ]);

    $booking->services()->attach($validated['services']);

    return redirect()->route('admins.allBooking')->with('success', 'Rendez-vous créé avec succès !');
}

    //
}

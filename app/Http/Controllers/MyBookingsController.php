<?php

namespace App\Http\Controllers;

use App\Models\Booking\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyBookingsController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()
            ->with(['services', 'payment'])
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->paginate(10);

        return view('my-bookings', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        // Vérification de l'appartenance
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
    
        // Vérification du délai de 48h
        $bookingDateTime = Carbon::parse($booking->date->format('Y-m-d') . ' ' . $booking->time->format('H:i:s'));
        if (Carbon::now()->diffInHours($bookingDateTime) < 48) {
            return back()->with('error', 'Annulation impossible < 48h avant le RDV');
        }
    
        // Suppression en cascade
        DB::transaction(function () use ($booking) {
            // 1. Supprimer les relations dans booking_service
            $booking->services()->detach();
    
            // 2. Supprimer le paiement associé (si existant)
            if ($booking->payment) {
                $booking->payment()->delete();
            }
    
            // 3. Supprimer la réservation
            $booking->delete();
        });
    
        return back()->with('success', 'Réservation annulée');
    }
}
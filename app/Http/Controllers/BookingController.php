<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service\Service;
use App\Models\Booking\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Payment\Payment;
use App\Models\Disponibilite;
Use App\Models\Coiffeur;

class BookingController extends Controller
{
    public function selectServices(Request $request)
    {
        // Validation des services sélectionnés
        $request->validate([
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id'
        ]);

        // Récupération des services depuis la base de données
        $selectedServices = Service::whereIn('id', $request->services)->get();
        
        // Stockage en session
        session([
            'selected_services' => $selectedServices,
            'total_duration' => $selectedServices->sum('duration'),
            'total_price' => $selectedServices->sum('price')
        ]);

        return redirect()->route('booking.show');
    }

    public function showBookingForm(Request $request)
    {
        if (!session()->has('selected_services')) {
            return redirect()->route('services.show')->with('error', 'Veuillez sélectionner des services');
        }

        $selectedDate = $request->input('date', Carbon::tomorrow()->format('Y-m-d'));
        $availableDates = $this->generateAvailableDates();
        $availableHours = $this->generateTimeSlots($selectedDate);

        return view('booking', [
            'validated_services' => session('selected_services'),
            'available_dates' => $availableDates,
            'available_hours' => $availableHours,
            'selected_date' => $selectedDate
        ]);
    }


    public function storeBooking(Request $request)
    {
        // Validation des données
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i'
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté');
        }
        // Création de la réservation
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'time' => $request->time,
            'duration' => session('total_duration'),
            'price' => session('total_price')
        ]);

        $booking->services()->attach(session('selected_services')->pluck('id'));

        // Nettoyage de la session
        /* session()->forget(['selected_services', 'total_duration', 'total_price']);  */

        return redirect()->route('checkout')->with('success', 'Réservation confirmée!');
    }
    
    private function generateAvailableDates()
    {
        $dates = [];
        $start = Carbon::tomorrow();
        $end = Carbon::tomorrow()->addDays(30);

        while ($start <= $end) {
            if (!$start->isSunday()) { // Exemple: fermé le dimanche
                $dates[] = $start->format('Y-m-d');
            }
            $start->addDay();
        }

        return $dates;
    }

    private function generateTimeSlots($date)
    {
        $totalDuration = session('total_duration');
        $workStart = Carbon::createFromTime(9, 0);
        $workEnd = Carbon::createFromTime(23, 0);
        
        $bookings = Booking::whereDate('date', $date)->get();
        $slots = [];
        
        $currentTime = Carbon::parse($date)->setTime($workStart->hour, $workStart->minute);
        $endTime = Carbon::parse($date)->setTime($workEnd->hour, $workEnd->minute);

        while ($currentTime <= $endTime) {
            $slotEnd = $currentTime->copy()->addMinutes($totalDuration);
            
            if ($slotEnd > $endTime) break;

            $isAvailable = true;
            foreach ($bookings as $booking) {
                $bookingStart = Carbon::createFromFormat(
                    'Y-m-d H:i:s',
                    $booking->date->toDateString() . ' ' . $booking->time->toTimeString()
                );
                $bookingEnd = $bookingStart->copy()->addMinutes($booking->duration);
                
                if ($currentTime < $bookingEnd && $slotEnd > $bookingStart) {
                    $isAvailable = false;
                    break;
                }
            }

            $slots[] = [
                'start' => $currentTime->format('H:i'),
                'end' => $slotEnd->format('H:i'),
                'available' => $isAvailable
            ];

            $currentTime->addMinutes(30);
        }

        return $slots;
    }

    public function checkout(Request $request)
    {
        if (!session()->has('total_price')) {
            return redirect()->route('our_services');
        }

        $booking = Booking::where('user_id', auth()->id())
            ->latest()
            ->firstOrFail();
        
        if ($booking->created_at < now()->subMinutes(3)) {
            return redirect()->route('booking.show')
                ->with('error', 'Temps écoulé - Veuillez refaire votre réservation');
        }
        return view('checkout');
    }
    
    public function store_checkout(Request $request) {
        try {
            // Vérifier la session et l'authentification
            if (!session()->has('total_price') || !Auth::check()) {
                throw new \Exception('Session expirée');
            }
    
            // Valider les données
            $validated = $request->validate([
                'payment_id' => 'required|string',
                'methode' => 'required|string'
            ]);
    
            // Récupérer la réservation
            $booking = Booking::where('user_id', Auth::id())
                ->latest()
                ->firstOrFail();
    
            // Vérifier le montant
            $montant = session('total_price');
            if (!is_numeric($montant)) {
                throw new \Exception('Montant invalide');
            }
    
            // Créer le paiement
            Payment::create([
                'booking_id' => $booking->id,
                'montant' => $montant,
                'methode' => $validated['methode'],
                'date_paiement' => now(),
                'payment_id' => $validated['payment_id']
            ]);
    
            return response()->json([
                'success' => true,
                'redirect' => route('checkout.success')
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() // Retourner l'erreur exacte
            ], 500);
        }
    }
    public function checkoutSuccess()
    {
        try {
            $payment = Payment::whereHas('booking', function($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->firstOrFail();
    
            session()->forget(['selected_services', 'total_duration', 'total_price']);
    
            return redirect()->route('home')->with('success', 
                'Paiement de ' . $payment->montant . ' DH confirmé !'
            );
    
        } catch (\Exception $e) {
            return redirect()->route('checkout')
                ->with('error', 'Confirmation échouée');
        }
    }
    

    public function assignCoiffeur(Request $request, Booking $booking) {
        // Validation
        $request->validate([
            'coiffeur_id' => 'required|exists:coiffeurs,id'
        ]);
    
        // Vérifier la disponibilité du coiffeur
        $isAvailable = Disponibilite::where('coiffeur_id', $request->coiffeur_id)
            ->where('date', $booking->date)
            ->where('heure_debut', '<=', $booking->time)
            ->where('heure_fin', '>=', $booking->time)
            ->where('statut', 'disponible')
            ->exists();
    
        if (!$isAvailable) {
            return back()->with('error', 'Le coiffeur n\'est pas disponible !');
        }
    
        // Vérifier les conflits de rendez-vous
        $existingBooking = Booking::where('coiffeur_id', $request->coiffeur_id)
            ->where('date', $booking->date)
            ->where('time', $booking->time)
            ->exists();
    
        if ($existingBooking) {
            return back()->with('error', 'Ce coiffeur a déjà un rendez-vous !');
        }
    
        // Assigner le coiffeur
        $booking->update(['coiffeur_id' => $request->coiffeur_id]);
    
        return back()->with('success', 'Coiffeur assigné !');
    }
    
   // Dans BookingController.php
    public function getAvailableCoiffeurs(Booking $booking)
    {   
        // Vérification des données de base
        if (!$booking->exists || !$booking->duration) {
            return response()->json([]);
        }

        // Calcul des plages horaires avec Carbon
        $bookingDate = Carbon::parse($booking->date)->format('Y-m-d');
        $startTime = Carbon::parse($booking->time)->format('H:i:s');
        $endTime = Carbon::parse($booking->time)->addMinutes($booking->duration)->format('H:i:s');

        // Correction 2 : Requête corrigée
        $availableCoiffeurs = Coiffeur::whereHas('disponibilites', function($query) use ($bookingDate, $startTime, $endTime) {
            $query->whereDate('date', $bookingDate)
                ->where('statut', 'disponible')
                ->whereTime('heure_debut', '<=', $startTime)
                ->whereTime('heure_fin', '>=', $endTime);
        })
        ->whereDoesntHave('bookings', function($query) use ($bookingDate, $startTime, $endTime) {
            $query->whereDate('date', $bookingDate)
                ->where(function($q) use ($startTime, $endTime) {
                    $q->whereRaw('? BETWEEN time AND ADDTIME(time, SEC_TO_TIME(duration * 60))', [$startTime])
                        ->orWhereRaw('? BETWEEN time AND ADDTIME(time, SEC_TO_TIME(duration * 60))', [$endTime]);
                });
        })
        ->get(['id', 'nom', 'prenom']);

        // Debug : Log des résultats
        \Log::info('Coiffeurs disponibles:', $availableCoiffeurs->toArray());

        return response()->json($availableCoiffeurs);
    }
}

<?php

namespace App\Models\Payment;
Use App\Models\Booking\Booking;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'montant',
        'methode',
        'date_paiement',
        'payment_id'
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
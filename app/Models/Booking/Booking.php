<?php

namespace App\Models\Booking;

use App\Models\User;
use App\Models\Service\Service;
use App\Models\Payment\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coiffeur;
class Booking extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "bookings";

    protected $fillable = [
        "user_id",
        "coiffeur_id",
        "date",
        "time",
        "duration",
        "price",
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i'
    ];
    
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service')->withTimestamps();
    }

    public function payment()
        {
            return $this->hasOne(Payment::class);
        }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function coiffeur()
    {
        return $this->belongsTo(Coiffeur::class);
    }
}

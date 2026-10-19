<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBookings extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "booking_service";

    protected $fillable = [
        "booking_id",
        "service_id"
    ];
}

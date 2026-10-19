<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Booking\Booking;
class Coiffeur extends Authenticatable


    {
        use HasFactory, Notifiable;

        public $timestamps = true;
    
        protected $guard = 'Coiffeur';
        protected $table = 'Coiffeurs';
    
        protected $fillable = [
            'nom',
            'prenom',
            'email',
            'password',
            'telephone',
            'adresse',
            'nom_utilisateur',
            'specialite',
            //'jours_ouverture',
            //'heures_ouverture',
            //'heures_fermeture',
            
        ];
        protected $hidden = [
            'password',
            'remember_token',
        ];
        protected $casts = [
            'email_verified_at' => 'datetime',
           // 'jours_ouverture' => 'array', // Pour stocker les jours d'ouverture sous forme de tableau
        ];

        // Relation avec les disponibilités
    public function disponibilites()
    {
        return $this->hasMany(Disponibilite::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
  
}

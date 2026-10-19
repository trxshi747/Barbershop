<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    use HasFactory;

    public $timestamps = true;


    protected $fillable = [
        'coiffeur_id',
        'date',
        'heure_debut',
        'heure_fin',
        'statut', // 'disponible', 'indisponible', 'pause'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function coiffeur()
    {
        return $this->belongsTo(Coiffeur::class);
    }
}

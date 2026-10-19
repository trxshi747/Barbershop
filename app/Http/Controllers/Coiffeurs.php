<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\Disponibilite;
class Coiffeurs extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:Coiffeur');
    }


    

    // Traiter la connexion
    

        
        
        // Déconnexion
    

    public function calendrier()
{   
    $Coiffeur = Auth::guard('Coiffeur')->user();
    $disponibilites = $Coiffeur->disponibilites()
        ->orderBy('date')
        ->orderBy('heure_debut')
        ->get()
        ->groupBy('date');


    return view('admins.coiffeurs.calendrier', compact('disponibilites')); // vue calendrier
}

public function updateDisponibilite(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'heure_debut' => 'required|date_format:H:i',
        'heure_fin' => 'required|date_format:H:i|after:heure_debut',
        'statut' => 'required|in:disponible,indisponible,pause',
    ]);

    $Coiffeur = Auth::guard('Coiffeur')->user();

    $disponibilite= $Coiffeur->disponibilites()->updateOrCreate(
        [
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
        ],
        ['statut' => $request->statut]
    );

    return back()->with( 'success', 'Disponibilité mise à jour avec succès');
}
    public function deleteDisponibilite($id)
    {
        $Coiffeur = Auth::guard('Coiffeur')->user();
        $disponibilite = $Coiffeur->disponibilites()->findOrFail($id);
        $disponibilite->delete();

    return back()->with('success', 'Disponibilité supprimée avec succès');
    }


}







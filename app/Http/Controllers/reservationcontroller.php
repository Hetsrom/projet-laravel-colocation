<?php

namespace App\Http\Controllers;

use App\Models\offres;
use App\Models\Reservation;
use Illuminate\Http\Request;

class reservationcontroller extends Controller
{
    //
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    // Afficher le formulaire pour créer une réservation
    public function create(offres $listing)
    {
        return view('reservations.create', compact('listing'));
    }

    // Enregistrer une nouvelle réservation
    public function store(Request $request, offres $offre)
    {
        $validatedData = $request->validate([
            'offre_id' => 'required|exists:offres,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|string',
        ]);

        // Créer la réservation avec les données validées
        $reservation = Reservation::create([
            'user_id' => auth()->id(), // Utilisateur connecté
            'offre_id' => $offre->id,  // L'ID de l'offre
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'status' => $validatedData['status'] ?? 'pending',
        ]);

        return redirect()->route('reservations.index')->with('success', 'Réservation demandée avec succès.');
    }

    // Afficher les détails d'une réservation spécifique
    public function show(Reservation  $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    // Annuler une réservation
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation annulée.');
    }
}

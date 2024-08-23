<?php

namespace App\Http\Controllers;

use App\Models\offres;
use Illuminate\Http\Request;

class offrecontroller extends Controller
{
    public function index()
    {
        $offres = offres::all();
        return view('offres.index', compact('offres'));
    }

    // Afficher le formulaire de création d'une annonce
    public function create()
    {
        return view('offres.create');
    }

    // Enregistrer une nouvelle annonce
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'address' => 'required',
            'durée' => 'required|string|max:255',
            'prix' => 'required|numeric',
        ]);

        $listing = new offres();
        $listing->titre= $validated['titre'];
        $listing->address = $validated['address'];
        $listing->durée = $validated['durée'];
        $listing->prix = $validated['prix'];
        $listing->user_id = auth()->id();
        $listing->save();

        return redirect()->route('offres.index')->with('success', 'Annonce créée avec succès.');
    }

    // Afficher une annonce spécifique
    public function show(offres $listing)
    {
        return view('offres.show', compact('listing'));
    }

    // Afficher le formulaire d'édition d'une annonce
    public function edit(offres $listing)
    {
        return view('offres.edit', compact('offres'));
    }

    // Mettre à jour une annonce
    public function update(Request $request, offres $listing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required',
            'durée' => 'required|string|max:255',
            'prix' => 'required|numeric',
        ]);

        $listing->update($validated);

        return redirect()->route('offres.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    // Supprimer une annonce
    public function destroy(offres $listing)
    {
        $listing->delete();

        return redirect()->route('offres.index')->with('success', 'Annonce supprimée avec succès.');
    }
}

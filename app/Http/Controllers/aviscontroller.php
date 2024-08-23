<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\offres;
use Illuminate\Http\Request;

class aviscontroller extends Controller
{
    //
    public function index(offres $listing)
    {
        $reviews = $listing->reviews;
        return view('reviews.index', compact('reviews', 'listing'));
    }

    // Afficher le formulaire pour laisser un avis
    public function create(offres $listing)
    {
        return view('reviews.create', compact('listing'));
    }

    // Enregistrer un nouvel avis
    public function store(Request $request, offres $listing)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Avis::create([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('reviews.index', $listing->id)->with('success', 'Avis ajouté avec succès.');
    }

    // Afficher un avis spécifique
    public function show(Avis $review)
    {
        return view('reviews.show', compact('review'));
    }
}

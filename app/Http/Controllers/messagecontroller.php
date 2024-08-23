<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\offres;
use Illuminate\Http\Request;

class messagecontroller extends Controller
{
    //
    public function index()
    {
        $messages = Message::where('user_id', auth()->id())->get();
        return view('messages.index', compact('messages'));
    }

    // Afficher le formulaire pour envoyer un message
    public function create(offres $listing)
    {
        return view('messages.create', compact('listing'));
    }

    // Envoyer un message
    public function store(Request $request, offres $listing)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id,
            'content' => $validated['content'],
        ]);

        return redirect()->route('messages.index')->with('success', 'Message envoyé avec succès.');
    }

    // Afficher un message spécifique
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}

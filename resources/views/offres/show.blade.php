@extends('layouts.app')

@section('content')
    <p><strong>Titre:</strong>{{ $listing->titre }}</p>
    <p><strong>Adresse:</strong>{{ $listing->address }}</p>
    <p><strong>Durée:</strong> {{ $listing->durée }}</p>
    <p><strong>Prix:</strong> {{ $listing->prix }} € par nuit</p>

    <a href="{{ route('reservations.create', $listing->id) }}" class="btn btn-success">Réserver cette Annonce</a>

    <a href="{{ route('offres.index') }}" class="btn btn-secondary">Retour à la Liste</a>
@endsection

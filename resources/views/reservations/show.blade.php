@extends('layouts.app')

@section('content')
    <h1>Détails de la Réservation</h1>
    <p><strong>Annonce:</strong> <a href="{{ route('offres.show', $reservation->listing->id) }}">{{ $reservation->listing->title }}</a></p>
    <p><strong>Date de Début:</strong> {{ $reservation->start_date }}</p>
    <p><strong>Date de Fin:</strong> {{ $reservation->end_date }}</p>
    <p><strong>Statut:</strong> {{ ucfirst($reservation->status) }}</p>
@endsection

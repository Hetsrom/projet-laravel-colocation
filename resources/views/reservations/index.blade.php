@extends('layouts.app')

@section('content')
    <h1>Mes Réservations</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($reservations as $reservations)
            <li>
                Annonce: <a href="{{ route('offres.show', $reservations->listing->id) }}">{{ $reservations->listing->titre }}</a> <br>
                Du {{ $reservations->start_date }} au {{ $reservations->end_date }} <br>
                Statut: {{ ucfirst($reservation->status) }}
                <form action="{{ route('reservations.destroy', $reservations->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Annuler</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

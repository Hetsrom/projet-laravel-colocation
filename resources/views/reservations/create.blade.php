@extends('layouts.app')

@section('content')
    <h1>Faire une Réservation pour {{ $listing->titre }}</h1>

    <form action="{{ route('reservations.store', $listing->id) }}" method="POST">
        @csrf

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">



        <div class="form-group">
            <label for="start_date">Date de Début</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de Fin</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
@endsection

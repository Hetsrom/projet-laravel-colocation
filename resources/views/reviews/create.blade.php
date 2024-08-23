@extends('layouts.app')

@section('content')
    <h1>Laisser un Avis pour {{ $listing->title }}</h1>

    <form action="{{ route('offres.store', $listing->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="rating">Note (1-5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="form-group">
            <label for="comment">Commentaire</label>
            <textarea name="comment" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection

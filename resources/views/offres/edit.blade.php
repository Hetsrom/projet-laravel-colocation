@extends('layouts.app')

@section('content')
    <h1>Modifier l'Annonce</h1>

    <form action="{{ route('offres.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $listing->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $listing->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" name="location" class="form-control" value="{{ $listing->location }}" required>
        </div>

        <div class="form-group">
            <label for="price">Prix (par nuit)</label>
            <input type="number" name="price" class="form-control" value="{{ $listing->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
@endsection

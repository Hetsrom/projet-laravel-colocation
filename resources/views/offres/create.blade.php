@extends('layouts.app')

@section('content')
    <h1>Ajouter une Nouvelle Annonce</h1>

    <form action="{{ route('offres.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Adresse</label>
            <textarea name="address" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="durée">Durée</label>
            <input type="text" name="durée" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix (par nuit)</label>
            <input type="number" name="prix" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'Annonce</button>
    </form>
@endsection

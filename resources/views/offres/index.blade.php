@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Annonces</h1>
        <a href="{{ route('offres.create') }}" class="btn btn-primary">Ajouter une Annonce</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($offres as $listing)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        {{--  --</h5>--}}

                        <p class="card-text">{{ $listing->titre }}</p>
                        <p class="card-text">{{ $listing->address }}</p>
                        <p class="card-text">{{ $listing->durée }}</p>
                        <p class="card-text"><strong>{{ $listing->prix }} €</strong> par nuit</p>
                        <a href="{{ route('offres.show', $listing->id) }}" class="btn btn-outline-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucune annonce disponible pour l'instant.</p>
        @endforelse
    </div>
@endsection

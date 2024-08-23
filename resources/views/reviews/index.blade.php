@extends('layouts.app')

@section('content')
    <h1>Avis pour {{ $listing->title }}</h1>
    <a href="{{ route('avis.create', $listing->id) }}" class="btn btn-primary">Ajouter un Avis</a>

    @foreach($reviews as $review)
        <div class="review">
            <p><strong>Note:</strong> {{ $review->rating }} / 5</p>
            <p>{{ $review->comment }}</p>
            <hr>
        </div>
    @endforeach
@endsection

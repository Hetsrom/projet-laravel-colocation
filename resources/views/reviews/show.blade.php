@extends('layouts.app')

@section('content')
    <h1>Détails de l'Avis</h1>
    <p><strong>Note:</strong> {{ $review->rating }} / 5</p>
    <p>{{ $review->comment }}</p>
@endsection

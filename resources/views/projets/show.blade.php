@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $projet->nom }}</h1>
    <p><strong></strong> {!! $projet->introduction !!}</p>
    <a href="{{ route('projets.details', $projet->id) }}" class="btn btn-info">En savoir plus sur ce projet</a>
</div>
@endsection

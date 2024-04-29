@extends('layouts.app')

@section('title', $projet->nom)

@section('content')
<div class="container">
    <h1 class="display-4">{{ $projet->nom }}</h1>
    <div class="my-4">
        <p><strong></strong> {!! $projet->description !!}</p>
    </div>
    <!-- Bouton pour revenir à la liste des projets -->
    <a href="{{ route('projets.show', $projet->id) }}" class="btn btn-secondary">Voir le projet</a>
</div>
@endsection

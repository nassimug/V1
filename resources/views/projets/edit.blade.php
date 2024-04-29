
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Projet : {{ $projet->nom }}</h1>
    <form method="POST" action="{{ route('projets.update', $projet->id) }}">
        @csrf
        @method('PUT') <!-- Important pour spécifier que c'est une requête PUT -->
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du Projet</label>
            <input type="text" class="form-control" id="nom" name="nom" required value="{{ $projet->nom }}">
        </div>

        <div class="mb-3">
            <label for="plateforme_id" class="form-label">Plateforme</label>
            <select class="form-select" id="plateforme_id" name="plateforme_id" required>
                @foreach ($plateformes as $plateforme)
                    <option value="{{ $plateforme->id }}" {{ $plateforme->id == $projet->plateforme_id ? 'selected' : '' }}>{{ $plateforme->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="introduction" class="form-label">Introduction</label>
            <textarea class="form-control" id="myeditorinstance" name="introduction" required>{{ $projet->introduction }}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description Détaillée</label>
            <textarea class="form-control" id="myeditorinstance" name="description" required>{{ $projet->description }}</textarea>
        </div>

        
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
<!-- Script TinyMCE -->
<x-head.tinymce-config/>
@endsection
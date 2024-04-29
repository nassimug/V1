@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une Réservation</h1>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
            @error('prenom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="identifiant" class="form-label">Identifiant</label>
            <input type="text" class="form-control @error('identifiant') is-invalid @enderror" id="identifiant" name="identifiant" value="{{ old('identifiant') }}" required>
            @error('identifiant')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut') }}" required>
            @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" name="date_fin" value="{{ old('date_fin') }}" required>
            @error('date_fin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="equipement_id" class="form-label">Équipement</label>
            <select class="form-select @error('equipement_id') is-invalid @enderror" id="equipement_id" name="equipement_id" required>
                @foreach($equipements as $equipement)
                    <option value="{{ $equipement->id }}">{{ $equipement->nom }}</option>
                @endforeach
            </select>
            @error('equipement_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
@endsection

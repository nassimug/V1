@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Réserver l'équipement : <strong>{{ $equipement->nom }}</strong></h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Équipements</li>
                <li>{{ $equipement->nom }}</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
   
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <input type="hidden" name="equipement_id" value="{{ $equipement->id }}">

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

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

@endsection

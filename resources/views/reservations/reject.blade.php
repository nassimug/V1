@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Refuser la Réservation du <strong>{{ $reservation->equipement->nom }}</strong> pour <strong>{{ $reservation->nom }} {{ $reservation->prenom }}</strong></h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Réservations</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
   
    <form action="{{ route('reservations.reject', $reservation->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Rejeter</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection

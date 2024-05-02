@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Details de la réservation : <strong>{{ $reservation->equipement->nom }}</strong> pour <strong>{{ $reservation->nom }} {{ $reservation->prenom}}</strong></h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Réservations</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<div class="container">
    <div class="card">
        <div class="card-header">
            Réservation de l'équipement: <strong>{{ $reservation->equipement->nom }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Nom: </strong>{{ $reservation->nom }}</p>
            <p><strong>Prénom:</strong> {{ $reservation->prenom}}</p>
            <p><strong>Email:</strong> {{ $reservation->email }}</p>
            <p><strong>Date d'emprunt:</strong> {{ $formattedDateDebut }}</p> <!-- Utilisation de la date formatée -->
            <p><strong>Date de réstitution:</strong> {{ $formattedDateFin }}</p> <!-- Utilisation de la date formatée -->
            <strong>Commentaire:</strong>
                {{ $reservation->commentaire }}
        </div>
    </div>
</div>

@endsection

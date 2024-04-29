@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Details de la réservation </h1>
    <div class="card">
        <div class="card-header">
            Réservation de l'équipement: {{ $reservation->equipement->nom }}
        </div>
        <div class="card-body">
            <p>Nom: {{ $reservation->nom }}</p>
            <p>Prénom: {{ $reservation->prenom}}</p>
            <p>Email: {{ $reservation->email }}</p>
            <p>Date d'emprunt: {{ $formattedDateDebut }}</p> <!-- Utilisation de la date formatée -->
            <p>Date de réstitution: {{ $formattedDateFin }}</p> <!-- Utilisation de la date formatée -->
        </div>
    </div>
</div>
@endsection

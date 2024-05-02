@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            @if(auth()->user()->role === 'admin')
                <h2>Réservations en attente de confirmation</h2>
            @else
                <h2>Réservations de <strong>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</strong></h2>
            @endif
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Réservations</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container" >
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Équipement</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @forelse($reservations as $reservation)
        <tr>
            <td>{{ $reservation->nom }}</td>
            <td>{{ $reservation->equipement->nom }}</td>
            <td>{{ $reservation->statut }}</td>
            <td>
                <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">Détails</a>
                
                @if(auth()->user()->role === 'admin')
                    <!-- Liens pour accepter et rejeter -->
                    <a href="{{ route('reservations.showAccept', $reservation->id) }}" class="btn btn-success btn-sm">Accepter</a>
                    <a href="{{ route('reservations.showReject', $reservation->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                @endif

                <!-- Bouton de suppression -->
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Aucune réservation en attente de confirmation.</td></tr>
    @endforelse
</tbody>

    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Projets</h1>
    @foreach ($projets as $projet)
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title">{{ $projet->nom }}</h5>
                <div>
                    <h6 class="card-subtitle mb-2 text-muted">Plateforme: {{ $projet->plateforme->type ?? 'Non spécifié' }}</h6>
                </div>
                <div>
                    <a href="{{ route('projets.show', $projet->id) }}" class="btn btn-primary">Voir les détails</a>
                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-secondary">Modifier</a>
                </div>
            </div>
        </div>

    @endforeach
</div>
<div class="d-flex justify-content-center" style="margin-top: 50px;">
    {{ $projets->links() }} <!-- Ajouter la pagination ici -->
</div>
<style>
 


.card img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.btn-group {
    display: flex;
    justify-content: space-between;
}

 .container {
        max-width: 1200px; /* Limite la largeur maximale pour les grands écrans */
        margin: auto; /* Centre le conteneur sur la page */
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }

    .card-body {
        padding: 15px;
        display: flex;
        flex-wrap: wrap; /* Permet aux éléments de passer à la ligne sur les petits écrans */
        justify-content: space-between; /* Espacement uniforme entre les éléments */
        align-items: center;
    }

    .btn {
        margin: 5px;
        padding: 8px 16px;
        font-size: 16px; /* Taille de police plus lisible */
    }

    @media (max-width: 768px) {
        .btn {
            padding: 6px 12px;
            font-size: 14px; /* Taille de police réduite pour les petits écrans */
            flex-grow: 1; /* Les boutons prennent toute la largeur disponible */
        }

        .card-body {
            flex-direction: column; /* Empile les éléments verticalement sur les petits écrans */
        }
    }
</style>
@endsection

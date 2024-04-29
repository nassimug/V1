@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">Créer un Nouveau Projet</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projets.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du Projet</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="plateforme_id" class="form-label">Plateforme</label>
                            <select class="form-select" id="plateforme_id" name="plateforme_id" required>
                                @foreach ($plateformes as $plateforme)
                                    <option value="{{ $plateforme->id }}">{{ $plateforme->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label">Introduction</label>
                            <textarea class="form-control" id="myeditorinstance" name="introduction"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description Détaillée</label>
                            <textarea class="form-control" id="myeditorinstance" name="description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Créer Projet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Styles généraux pour l'ensemble du formulaire */
.container {
    margin-top: 50px;
}

.card {
    border-radius: 8px; /* Bordures arrondies pour la card */
    border: none; /* Pas de bordure pour un look plus propre */
}

.card-header {
    background-color: #007bff; /* Couleur bleue pour l'en-tête */
}

.form-label {
    font-weight: bold; /* Texte en gras pour les labels */
}

.btn-primary {
    background-color: #0056b3; /* Couleur plus foncée pour le bouton */
    border: none; /* Pas de bordure pour le bouton */
    padding: 10px 0; /* Padding plus important pour un meilleur toucher */
    transition: background-color 0.3s; /* Transition pour l'effet de survol */
}

.btn-primary:hover {
    background-color: #003875; /* Changement de couleur au survol */
}

/* Responsive design pour améliorer l'affichage sur petits écrans */
@media (max-width: 768px) {
    .container {
        margin-top: 20px;
    }

    .card {
        margin: 10px;
    }
}

</style>
<!-- Script TinyMCE -->
<x-head.tinymce-config/>
@endsection

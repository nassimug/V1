@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Ajouter un équipement</h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Admin</li>
                <li>Ajouter un équipement</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">Ajouter un Nouvel Équipement</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('equipements.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de l'Équipement</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="projet_id" class="form-label">Projet Associé</label>
                            <select class="form-select" id="projet_id" name="projet_id" required>
                                @foreach($projets as $projet)
                                    <option value="{{ $projet->id }}">{{ $projet->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image de l'Équipement</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>

                        <!-- Intégration de TinyMCE pour les champs de texte enrichi -->
                        @foreach (['description' => 'Description Détaillée', 'aperçu' => 'Aperçu', 'spécifications' => 'Spécifications', 'caractéristiques' => 'Caractéristiques', 'utilisation' => 'Utilisation', 'téléchargements' => 'Téléchargements'] as $field => $label)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <textarea class="form-control" id="myeditorinstance" name="{{ $field }}"></textarea>
                            </div>
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary w-100">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
 
.card {
    border-radius: 8px;
    border: none;
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
}

.form-label {
    font-weight: bold;
}

.form-control, .form-select {
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus, .form-select:focus {
    border-color: #0056b3;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    background-color: #0056b3;
    border: none;
    padding: 10px 0;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #003875;
}

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

@extends('layouts.app')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $equipement->nom }}</h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Équipements</li>
                <li>{{ $equipement->nom }}</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs -->

<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div id="carouselEquipement{{ $equipement->id }}" class="carousel slide" data-bs-ride="carousel">
                <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($equipement->images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ Storage::url($image->path) }}" class="d-block w-80" alt="...">
                    </div>
                    @endforeach
                </div>
            </div>
                <button class="carousel-control-prev" type="button" 
                    data-bs-target="#carouselEquipement{{ $equipement->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden ">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselEquipement{{ $equipement->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <p>{!! $equipement->description !!}</p>
        </div>
    </div>
</div>

<div class="container mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#aperçu">Aperçu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#spécifications">Spécifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#caractéristiques">Caractéristiques</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#utilisation">Utilisation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#téléchargements">Téléchargements</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="aperçu" class="container tab-pane active"><br>
            <p>{!! $equipement->aperçu !!}</p>
        </div>
        <div id="spécifications" class="container tab-pane fade"><br>
            <p>{!! $equipement->spécifications !!}</p>
        </div>
        <div id="caractéristiques" class="container tab-pane fade"><br>
            <p>{!! $equipement->caractéristiques !!}</p>
        </div>
        <div id="utilisation" class="container tab-pane fade"><br>
            <p>{!! $equipement->utilisation !!}</p>
        </div>
        <div id="téléchargements" class="container tab-pane fade"><br>
            <p>{!! $equipement->téléchargements !!}</p>
        </div>
    </div>
</div>

<script>
$(function() {
    $('.nav-tabs a').on('click', function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Activer le premier onglet au chargement de la page (si nécessaire)
    $('.nav-tabs a:first').tab('show');
});
</script>

@endsection

@section('css')
<style>
/* Styles globaux pour la page */
.container {
    max-width: 1200px; /* Ajuster selon la largeur souhaitée */
    margin: auto;
}

/* Carrousel */
.carousel-inner img {
    object-fit: cover; /* Assure que les images couvrent bien tout l'espace */
    border-radius: 5px; /* Bordures arrondies pour les images */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Ombre légère pour un effet de profondeur */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #0056b3; /* Couleur de fond pour les contrôles */
    border-radius: 50%; /* Rend les boutons ronds */
    padding: 10px; /* Espacement intérieur */
}

/* Onglets */
.nav-tabs .nav-item {
    margin-right: 5px; /* Espacement entre les onglets */
}

.nav-tabs .nav-link {
    border: 1px solid transparent; /* Enlève la bordure par défaut */
    border-radius: 5px; /* Bordures arrondies pour les onglets */
    background-color: #f8f9fa; /* Fond légèrement gris pour les onglets inactifs */
    color: #0056b3; /* Couleur du texte pour tous les onglets */
    margin-bottom: -1px; /* Alignement correct des onglets avec le contenu */
}

.nav-tabs .nav-link.active {
    color: #ffffff; /* Texte blanc pour l'onglet actif */
    background-color: #0056b3; /* Fond bleu pour l'onglet actif */
}

.tab-content {
    padding: 20px; /* Espacement autour du contenu des onglets */
    border: 1px solid #0056b3; /* Bordure autour du contenu des onglets */
    border-top: none; /* Enlève la bordure du haut pour fusionner avec les onglets */
    border-radius: 0 0 5px 5px; /* Arrondit les coins inférieurs */
}

/* Responsive Design pour les petits écrans */
@media (max-width: 768px) {
    .nav-tabs {
        flex-direction: column; /* Onglets empilés verticalement sur petits écrans */
    }
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup/dist/magnific-popup.css">

<!-- Inclusion des JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

@endsection

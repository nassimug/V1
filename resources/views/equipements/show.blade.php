@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-gray font-weight-bold my-4">{{ $equipement->nom }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div id="carouselEquipement{{ $equipement->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($equipement->images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="..." height=400px weight = 300px >
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselEquipement{{ $equipement->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
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
        <div  id = "aperçu" class="container tab-pane active"><br>
     
            <p>{!! $equipement->aperçu !!}</p>
        </div>
        <div id = "spécifications" class="container tab-pane fade"><br>
          
            <p>{!! $equipement->spécifications !!}</p>
        </div>
        <div id = "caractéristiques" class="container tab-pane fade"><br>
          
            <p>{!! $equipement->caractéristiques !!}</p>
        </div>
        <div id="utilisation" class="container tab-pane fade"><br>
            <p>{!! $equipement->utilisation !!}</p>
            <a href="{{ url('/') }}">Retour à l'accueil</a>
        </div>

        <div  id = "téléchargements" class="container tab-pane fade"><br>
         
            <p>{!! $equipement->téléchargements !!}</p>
        </div>
    </div>
</div>


<script>
$(function() {
    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
})
</script>

@endsection
@section('css')
<style>
.text-gray {
    color: #6c757d;
    /* Bootstrap's gray */
}

hr {
    border-top: 1px solid #6c757d;
    /* Matching gray line */
}
.nav-item{
    border-color:black;
}
</style>
@endsection
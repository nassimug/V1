@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $projet->nom }}</h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>{{ $projet->plateforme->nom }}</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
    <p><strong></strong> {!! $projet->introduction !!}</p>
    <a href="{{ route('projets.details', $projet->id) }}" class="btn btn-info">En savoir plus sur ce projet</a>
</div>

@endsection

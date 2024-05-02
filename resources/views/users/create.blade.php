@extends('layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Créer un utilisateur</h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li>Admin</li>
                <li>Créer un utilisateur</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
   
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-select" id="role" name="role">
              <option value="chercheur">Chercheur</option>
              <option value="enseignant">Enseignant</option>
              <option value="etudiant">Étudiant</option>
              <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

@endsection

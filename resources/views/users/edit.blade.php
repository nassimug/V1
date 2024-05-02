@extends('layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Modifier Utilisateur</h2>
            <ol>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li><a href="{{ route('users.list') }}">Liste des Utilisateurs</a></li>
                <li>Modifier</li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier les informations</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                <option value="chercheur" {{ $user->role == 'chercheur' ? 'selected' : '' }}>Chercheur</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('users.list') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

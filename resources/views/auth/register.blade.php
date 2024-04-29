@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inscription</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
            @error('prenom')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Changer le champ Login pour Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control @error('mdp') is-invalid @enderror" id="mdp" name="mdp" required>
            @error('mdp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mdp-confirm" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="mdp-confirm" name="mdp_confirmation" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                <option value="">Choisir un rôle...</option>
                <option value="chercheur">Chercheur</option>
                <option value="enseignant">Enseignant</option>
                <option value="etudiant">Étudiant</option>
                <option value="admin">Admin</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
@endsection

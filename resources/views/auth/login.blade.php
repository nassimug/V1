@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Connexion</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input id="mdp" type="password" class="form-control @error('mdp') is-invalid @enderror" name="mdp" required autocomplete="current-password">
            @error('mdp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </form>
</div>
@endsection


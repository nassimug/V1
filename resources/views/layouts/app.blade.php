<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Accueil')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    /* Réinitialisation de la navbar */
    .navbar {
        background-color: #007bff; /* Bleu primaire */
        box-shadow: 0 2px 4px rgba(0,0,0,.1); /* Ombre subtile */
    }
    .navbar .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
    }
    .navbar-brand img {
        height: 60px; /* Ajustez selon la taille de votre logo */
    }

    /* Liens de la navbar */
    .navbar-light .navbar-nav .nav-link {
        color: #ffffff; /* Blanc pour le texte */
        margin-left: 10px; /* Espace entre les liens */
        margin-right: 10px;
        transition: color 0.3s ease-in-out;
    }

    /* Hover sur les liens */
    .navbar-light .navbar-nav .nav-link:hover {
        color: #dfe6e9; /* Blanc légèrement atténué */
    }

    /* Dropdowns */
    .navbar-light .navbar-nav .nav-item.dropdown .nav-link {
        color: #ffffff;
    }
    
    /* Style du dropdown */
    .navbar-light .navbar-nav .nav-item.dropdown .dropdown-menu {
        background-color: #0056b3; /* Bleu plus foncé */
        border: none; /* Supprime la bordure */
    }

    /* Éléments du dropdown */
    .navbar-light .navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item {
        color: #ffffff; /* Blanc pour le texte */
        transition: background-color 0.3s ease-in-out;
    }
    
    /* Hover sur les éléments du dropdown */
    .navbar-light .navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item:hover {
        background-color: #003d70; /* Bleu encore plus foncé */
    }

    /* Comportement au survol pour le dropdown */
    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

   .custom-navbar {
    background-color: #007bff; /* Couleur de fond de la navbar */
    /* Autres styles de navbar */
}

.nav-items {
    list-style-type: none;
    /* Autres styles de liste */
}

.nav-item {
    position: relative; /* Pour positionner le dropdown */
    /* Autres styles de l'item */
}

.nav-item a {
    color: white; /* Couleur des liens */
    text-decoration: none;
    /* Autres styles des liens */
}

.dropdown-menu {
    display: none;
    position: absolute; /* Positionnement du dropdown */
    background-color: #0056b3; /* Fond du dropdown */
    /* Autres styles du dropdown */
}

.nav-item:hover .dropdown-menu {
    display: block; /* Affiche le dropdown au survol */
}
.dropdown-item:hover{
    background-color:#0056b3;
}
/* Centre les éléments de la navbar */
.navbar-collapse {
    justify-content: center; /* Centre les éléments horizontalement dans le conteneur */
}

/* Assure que les éléments de la navbar sont centrés et prennent la largeur appropriée */
.navbar-nav {
    flex-direction: row;
    align-items: center;
    width: 100%; /* Prend toute la largeur pour mieux contrôler le centrage */
    justify-content: center; /* Centre les éléments à l'intérieur de la liste */
}

.nav-item {
    margin: 0 10px; /* Ajoute de l'espace entre les éléments */
}

.navbar-brand {
    position: absolute; /* Permet de positionner le logo indépendamment des autres éléments */
    left: 10%;
    transform: translateX(-50%); /* Centre le logo exactement au milieu */
    padding: 0; /* Retire le padding par défaut pour un centrage précis */
}

</style>
 
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('layouts.app') }}">
                <img src="{{ asset('image/logo_ibiscsaclay.png') }}" alt="IBISC Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plateforme terrestre
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($projetsTerrestres as $projet)
                                <li><a class="dropdown-item" href="{{ route('projets.show', $projet->id) }}">{{ $projet->nom }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plateforme drone
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($projetsDrones as $projet)
                                <li><a class="dropdown-item" href="{{ route('projets.show', $projet->id) }}">{{ $projet->nom }}</a></li>
                            @endforeach
                        </ul
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipements.index') }}">Liste des matériels</a>
                    </li>
                    
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projets.index') }}">Liste des projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('equipements.create') }}">Ajouter un équipement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projets.create') }}">Créer un projet</a>
                        </li>
                    @endif
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations.index') }}">Reservations</a>
                    </li>
                    @endauth
                    @if(auth()->guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
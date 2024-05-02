
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'Accueil')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->

  <link rel="icon" type="image/png" href="{{ asset('path/to/your/favicon.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="{{ asset('vendor/animate.css/animate.min.css') }} " rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="{{ route('dashboard') }}" class="logo me-auto me-lg-0">
        <img src="{{ asset('img/logoibiscsaclay.png') }}" alt="IBISC Logo" class="img-fluid">
    </a></h1>
        
      <nav id="navbar" class="navbar order-last order-lg-0">

        <ul>
          <li><a href="{{ route('dashboard') }}" class="active">Accueil</a></li>
            
            <li class="dropdown">
                <a href="#"><span>Plateformes</span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li class="dropdown"><a href="#"><span> Plateforme terrestre</span> <i class="bi bi-chevron-right"></i></a>
                        <ul class="dropdown-menu">
                  @foreach($projetsTerrestres as $projet)
                    <li><a href="{{ route('projets.show', $projet->id) }}">{{ $projet->nom }}</a></li>
                  @endforeach
                </ul>
              </li>
             <li class="dropdown"><a href="#"><span> Plateforme drone</span> <i class="bi bi-chevron-right"></i></a>
                        <ul class="dropdown-menu">
                  @foreach($projetsDrones as $projet)
                    <li><a href="{{ route('projets.show', $projet->id) }}">{{ $projet->nom }}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
            </li>

          <li><a href="{{route('equipements.index')}}">Équipements</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          @auth
            <li><a href="{{route('reservations.index')}}">Réservations</a></li>
             

          @endauth
          @if(auth()->check() && auth()->user()->role === 'admin')
          <li class="dropdown">
            <a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dropdown-menu">

              <a href="{{ route('users.list') }}">Liste des utilisateurs</a>

              <li><a href="{{route('projets.index')}}">Projets</a></li>
              <li><a href="{{route('equipements.create')}}">Ajouter un équipement</a></li>
              <li><a href="{{route('projets.create')}}">Créer un projet</a></li>
            </ul>
          </li>
          @endif
          @if(auth()->guest())
            <li><a href="{{route('login')}}">Connexion</a></li>
            <li><a href="{{route('register')}}">Inscription</a></li>
          @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="https://twitter.com/IbiscEvry" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="https://www.youtube.com/channel/UCQ3DVPgSlQ-lrHjX9aO1sZQ" class="youtube"><i class="bu bi-youtube"></i></a>
        <a href="https://www.linkedin.com/company/laboratoire-ibisc" class="linkedin"><i class="bu bi-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End Header -->
   @yield('content')
</body>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 footer-contact text-center">
                <h3>Le Laboratoire IBISC (Informatique, Bioinformatique, Systèmes Complexes EA 4526)</h3>
                <p>
                    34 Rue du Pelvoux, <br>
                    91080 Évry-Courcouronnes<br>
                    France <br><br>
                    <strong style = "color:white;">Tél :</strong> 01 69 47 75 51<br>
                    <strong style = "color:white;">Email :</strong> hocine.yakoubi@univ-evry.fr - said.mammar@univ-evry.fr<br>
                </p>
            </div>
        </div>
    </div>
</div>


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
         Tous droits réservés <strong>©IBISC</strong> <a href="https://www.ibisc.univ-evry.fr/mentions-legales/">  | Mentions légales </a>
        </div>
        <div class="credits">
         Disigné par <a href="https://nassimug.github.io/portfolio/">Nassim MADI</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/IbiscEvry" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.youtube.com/channel/UCQ3DVPgSlQ-lrHjX9aO1sZQ" class="facebook"><i class="bx bxl-youtube"></i></a>
        <a href="https://www.linkedin.com/company/laboratoire-ibisc" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  </footer><!-- End Footer -->


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  
</style>
</html>
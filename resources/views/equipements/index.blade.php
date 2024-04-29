@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($equipements as $equipement)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                 @if(auth()->check() && auth()->user()->role === 'admin')
                <form action="{{ route('equipements.destroy', $equipement->id) }}" method="POST" class="delete-icon" onclick="return confirmDelete()">
                    @csrf
                @method('DELETE')
                <button> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
<path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
</svg></button>
                </form>
                 @endif
                <a href="{{ route('equipements.show', $equipement->id) }}">
                    @if($equipement->images->isNotEmpty())
                    <div id="carouselEquipement{{ $equipement->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($equipement->images as $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="...">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </a>
                
                <div class="card-body">
                    
    <a href="{{ route('equipements.show', $equipement->id) }}" class="link" style="text-decoration: none; color: inherit;"><h6>{{ Str::limit($equipement->nom, 25, '...') }}</h6></a>
    <div class="d-flex justify-content-between button-container">
        @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('equipements.edit', $equipement->id) }}" class="btn btn-primary flex-fill">Modifier</a>
        @endif
        
        @auth <!-- Si l'utilisateur est connecté -->
                            <button type="button" class="btn btn-info flex-fill" data-bs-toggle="modal" data-bs-target="#reserveModal{{ $equipement->id }}">
                                Réserver
                            </button>
                        @else <!-- Si l'utilisateur n'est pas connecté -->
                            <a href="{{ route('login') }}" class="btn btn-info flex-fill">
                                Réserver
                            </a>
                        @endauth


        
       <!-- Reservation Modal -->
<div class="modal fade" id="reserveModal{{ $equipement->id }}" tabindex="-1" aria-labelledby="reserveModalLabel{{ $equipement->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reserveModalLabel{{ $equipement->id }}">Réserver Équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="equipement_id" value="{{ $equipement->id }}">
                    <input type="date" name="date_debut" required class="form-control mb-2" placeholder="Date de début">
                    <input type="date" name="date_fin" required class="form-control mb-2" placeholder="Date de fin">
                    <button type="submit" class="btn btn-primary">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>
</div>

            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 50px;">
        {{ $equipements->links() }}
    </div>
</div>
<script>
function confirmDelete() {
    return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?');
}
</script>

<style>
  .carousel-item {
    height: 200px; /* Fixe la hauteur du carousel */
  }
  .carousel-item img {
    width: 0%; /* Prend toute la largeur de son conteneur */
    height: 100%; /* Prend toute la hauteur de son conteneur */
    object-fit: cover; /* Assure que l'image couvre entièrement la zone sans être déformée */
    transform: scale(0.8); /* Dézoomer légèrement l'image */
    transition: transform 0.3s ease-in-out; /* Ajoute une transition douce */
  }
  .btn {
    width: 100%;
    background-color: #0056b3; /* Couleur de fond principale */
    border: none;
    color: white;
    padding: 12px 24px; /* Padding uniforme */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px; /* Taille de police uniforme */
    border-radius: 5px; /* Bordures arrondies */
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out; /* Transitions douces */
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Ombre subtile pour un effet 3D léger */
    /*width: 110px; /* Largeur fixe pour tous les boutons */
    flex: 1;
    text-transform: uppercase; /* Texte en majuscules pour un look plus dynamique */
}

.btn:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.3); /* Ombre plus prononcée au survol */
}

.btn-danger {
    background-color: #dc3545; /* Rouge pour actions dangereuses */
}

.btn-danger:hover {
    background-color: #c82335;
}

.btn-info {
    background-color: #17a2b8; /* Bleu clair pour informations */
}

.btn-info:hover {
    background-color: #138496;
}

.btn-primary {
    background-color: #007bff; /* Bleu standard */
}

.btn-primary:hover {
    background-color: #0069d9;
}
.link h6:hover {
    color: #17a2b8; /* Change la couleur en bleu lorsque survolé */
}
.carousel-item img:hover {
    transform: scale(1.05); /* Agrandit l'image de 5% lorsqu'elle est survolée */
    transition: transform 0.3s ease-in-out; /* Ajoute une transition douce */
}
.card{
    border: none;
   background-color: #F5F5F5 ;
}
.card-img-top {
    margin-bottom: -5px; /* Réduit l'espace entre l'image et le contenu de la carte */
}

.card-body {
    padding-top: 0; /* Élimine le padding au-dessus du corps de la carte */
}
.delete-icon {
    position: absolute;
    top: 10px;   /* Ajustez en fonction de la marge souhaitée du bord supérieur */
    right: 10px;  /* Ajustez en fonction de la marge souhaitée du bord gauche */
    z-index: 10; /* S'assure que l'icône est au-dessus des autres éléments de la carte */
    color: #000000;  /* Couleur de l'icône pour la suppression */
    cursor: pointer;
}

.delete-icon:hover {
    color: #000000; /* Changement de couleur au survol pour une visibilité accrue */
}
.button-container {
    display: flex;
    gap: 10px; /* Ajoute un petit espace entre les boutons */
    width: 100%; /* Ensures the container takes full width */
        justify-content: space-between; /* Distributes space between buttons */
        flex-wrap: wrap; /* Allows buttons to wrap on smaller screens */
}
/* Réponses pour les tablettes */
@media (max-width: 992px) {
    .btn {
        padding: 10px 20px; /* Réduit légèrement le padding */
        font-size: 13px; /* Réduit légèrement la taille de la police */
    }
}

/* Réponses pour les mobiles */
@media (max-width: 768px) {
    .btn {
        padding: 8px 10px; /* Padding plus petit pour les petits écrans */
        font-size: 12px; /* Taille de police réduite pour une meilleure adaptation */
    }
}

</style>


@endsection


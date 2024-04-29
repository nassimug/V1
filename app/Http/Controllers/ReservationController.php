<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Equipement;
use Carbon\Carbon;
class ReservationController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $reservations = Reservation::with('equipement')->get(); // Admin peut voir toutes les réservations
        } else {
            $reservations = Reservation::where('user_id', auth()->id())->with('equipement')->get(); // Les utilisateurs ne voient que leurs réservations
        }
        return view('reservations.index', compact('reservations'));
    }


    public function create()
    {
        $equipements = Equipement::all();
        return view('reservations.create', compact('equipements'));
    }

    public function store(Request $request)
{
    $request->validate([
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'equipement_id' => 'required|exists:equipements,id'
    ]);

    // Récupération des informations de l'utilisateur connecté
    $user = auth()->user();

    // Création de la réservation avec les informations de l'utilisateur et les dates fournies
    Reservation::create([
        'nom' => $user->nom,
        'prenom' => $user->prenom,
        'email' => $user->email,
        'identifiant' => $user->login, // Assurez-vous que cela correspond à la colonne appropriée dans votre DB
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin,
        'equipement_id' => $request->equipement_id,
        'user_id' => $user->id
    ]);

    return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès.');
}



    public function show(Reservation $reservation)
    {
        // Vérifiez si l'utilisateur est admin ou le créateur de la réservation
        if (auth()->user()->role !== 'admin' && auth()->id() !== $reservation->user_id) {
            abort(403);
        }

        $formattedDateDebut = Carbon::parse($reservation->date_debut)->format('d/m/Y');
        $formattedDateFin = Carbon::parse($reservation->date_fin)->format('d/m/Y');

        return view('reservations.show', compact('reservation', 'formattedDateDebut', 'formattedDateFin'));
    }




    public function destroy(Reservation $reservation)
    {
        // Vérifiez si l'utilisateur est admin ou le créateur de la réservation
        if (auth()->user()->role !== 'admin' && auth()->id() !== $reservation->user_id) {
            abort(403);
        }

        $reservation->delete();
        return back()->with('success', 'Reservation deleted successfully.');
    }

}

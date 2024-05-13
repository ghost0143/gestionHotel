<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Chambre;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index(){
        $resevations = DB::table('reservations')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('chambres', 'reservations.chambre_id', '=', 'chambres.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->select('reservations.*', 'clients.nom as client_nom', 
            'clients.prenom as client_prenom', 'chambres.numero as chambre_numero', 
            'users.nom as user_nom', 'users.prenom as user_prenom')
            ->latest()
            ->get();
        return view('reservations.index', compact('resevations'));
    }

    public function formCreate(){
        $chambres = Chambre::all();
        $clients = Client::all();
        return view('reservations.create', compact('chambres', 'clients'));

    }

    public function create(Request $request) {
        $data = $request->validate([
            'chambre_id' => 'required',
            'client_id' => 'required',
            'startedDate' => 'required|date',
            'endedDate' => 'required|date|after:startedDate',
            'nombrePersonne' => 'required|integer|min:1',
        ]);
    
        $chambre = Chambre::findOrFail($data['chambre_id']);
        $reservations = Reservation::where('chambre_id', $data['chambre_id'])
                            ->where(function ($query) use ($data) {
                                $query->where('startedDate', '<=', $data['endedDate'])
                                    ->where('endedDate', '>=', $data['startedDate']);
                            })
                            ->exists();

        $reservation = Reservation::where(function ($query) {
                            $query->where('status', 'Attente')
                            ->orWhere('status', 'Confirmer');
                            })->exists();

    
        if ($reservations) {
            return redirect()->route('reservation.formCreate')->with('danger', 'La chambre n\'est pas disponible pour les dates sélectionnées.');
        }
    
        $startedDate = Carbon::parse($data['startedDate']);
        $endedDate = Carbon::parse($data['endedDate']);
        $nombreJoursSejour = $endedDate->diffInDays($startedDate);
        $prixTotal = $chambre->tarif * $nombreJoursSejour;
    
        $reservation = new Reservation();
        $reservation->chambre_id = $data['chambre_id'];
        $reservation->client_id = $data['client_id'];
        $reservation->startedDate = $startedDate;
        $reservation->endedDate = $endedDate;
        $reservation->nombrePersonne = $data['nombrePersonne'];
        $reservation->prixTotal = $prixTotal;
        $reservation->nombreJour = $nombreJoursSejour;
        $reservation->user_id = Auth::user()->id;
    
        DB::beginTransaction(); 
        try {
            $reservation->save();
    
            $chambre->status = 'Occupé';
            $chambre->save();
    
            DB::commit(); 
        } catch (\Exception $e) {
            DB::rollback(); 
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la réservation.');
        }
        return redirect()->route('reservation.index')->with('success', 'La réservation a été faite avec succès.');
    }

    public function edit($id){
        $chambres = Chambre::all();
        $clients = Client::all();
        $reservation = DB::table('reservations')
        ->join('clients', 'reservations.client_id', '=', 'clients.id')
        ->join('chambres', 'reservations.chambre_id', '=', 'chambres.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->select('reservations.*', 'clients.nom as client_nom', 
        'clients.prenom as client_prenom', 'chambres.numero as chambre_numero', 
        'users.nom as user_nom', 'users.prenom as user_prenom')
        ->where('reservations.id', '=', $id)
        ->first();
        return view('reservations.update', compact('reservation', 'clients', 'chambres'));
    }



    public function update(Request $request, $id) {
        $reservation = Reservation::findOrFail($id);
        $data = $request->validate([
            'chambre_id' => 'required',
            'client_id' => 'required',
            'startedDate' => 'required|date',
            'endedDate' => 'required|date|after:startedDate',
            'nombrePersonne' => 'required|integer|min:1',
        ]);
    
        $chambre = Chambre::findOrFail($data['chambre_id']);
    
        // Vérifier si la chambre a été modifiée
        if ($reservation->chambre_id != $data['chambre_id']) {
            // Vérifier la disponibilité de la nouvelle chambre pour les nouvelles dates
            $chambre = Chambre::findOrFail($data['chambre_id']);
            $reservationsForNewChambre = Reservation::where('chambre_id', $data['chambre_id'])
                                                    ->where('id', '!=', $id)
                                                    ->where('status', '!=', 'Annuler') 
                                                    ->where(function ($query) use ($data) {
                                                        $query->where('startedDate', '<=', $data['endedDate'])
                                                              ->where('endedDate', '>=', $data['startedDate']);
                                                    })
                                                    ->exists();
    
            if ($reservationsForNewChambre) {
                return redirect()->back()->with('danger', 'La nouvelle chambre n\'est pas disponible pour les dates sélectionnées.');
            }
        } else {
            // Vérifier si seules les dates ont été modifiées
            if ($reservation->startedDate != $data['startedDate'] || $reservation->endedDate != $data['endedDate']) {
                // Vérifier la disponibilité de la chambre pour les nouvelles dates
                $reservationsForNewDates = Reservation::where('chambre_id', $data['chambre_id'])
                                                        ->where('id', '!=', $id)
                                                        ->where('status', '!=', 'Annuler') 
                                                        ->where(function ($query) use ($data) {
                                                            $query->where('startedDate', '<=', $data['endedDate'])
                                                                  ->where('endedDate', '>=', $data['startedDate']);
                                                        })
                                                        ->exists();
    
                if ($reservationsForNewDates) {
                    return redirect()->back()->with('danger', 'La chambre n\'est pas disponible pour les nouvelles dates sélectionnées.');
                }
            }
        }

        $startedDate = Carbon::parse($data['startedDate']);
        $endedDate = Carbon::parse($data['endedDate']);
        $nombreJoursSejour = $endedDate->diffInDays($startedDate);
        $prixTotal = $chambre->tarif * $nombreJoursSejour;
    
        
        $reservation->chambre_id = $data['chambre_id'];
        $reservation->client_id = $data['client_id'];
        $reservation->startedDate = $startedDate;
        $reservation->endedDate = $endedDate;
        $reservation->nombrePersonne = $data['nombrePersonne'];
        $reservation->prixTotal = $prixTotal;
        $reservation->nombreJour = $nombreJoursSejour;
        $reservation->user_id = Auth::user()->id;
    
        DB::beginTransaction(); 
        try {
            $reservation->save();
    
            $chambre->status = 'Occupé';
            $chambre->save();
    
            DB::commit(); 
        } catch (\Exception $e) {
            DB::rollback(); 
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la réservation.');
        }
    
        return redirect()->route('reservation.index')->with('success', 'La réservation a été modofier avec succès.');
    
    }

    public function view($id){
        $reservation = DB::table('reservations')
        ->join('clients', 'reservations.client_id', '=', 'clients.id')
        ->join('chambres', 'reservations.chambre_id', '=', 'chambres.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->select('reservations.*', 'clients.nom as client_nom', 
        'clients.prenom as client_prenom', 'chambres.numero as chambre_numero', 
        'users.nom as user_nom', 'users.prenom as user_prenom')
        ->where('reservations.id', '=', $id)
        ->first();
        return view('reservations.view', compact('reservation'));
    }

    public function annuler($id){
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'Annuler';
        $reservation->save();

        return redirect()->route('reservation.view', $reservation->id)->with('success', 'Cette réservation a été annuler.');
    }

    public function confirmer($id){
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'Confirmer';
        $reservation->save();

        return redirect()->route('reservation.view', $reservation->id)->with('success', 'Cette réservation a été Confirmer avec succès.');
    }
    
    public function restaurer($id){
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'En attente';
        $reservation->save();

        return redirect()->route('reservation.view', $reservation->id)->with('success', 'Cette réservation a été mise en attente.');
    }

    public function destroy($id){
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservation.index')->with('danger', 'La reservation a été supprimé');


    }

    public function search(Request $request){
        $nom = $request->input('nom');
    
        $resevations = DB::table('reservations')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('chambres', 'reservations.chambre_id', '=', 'chambres.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->select('reservations.*', 'clients.nom as client_nom', 
                'clients.prenom as client_prenom', 'chambres.numero as chambre_numero', 
                'users.nom as user_nom', 'users.prenom as user_prenom')
            ->where('clients.nom', 'LIKE', "%$nom%")
            ->latest()
            ->paginate(10);
    
        return view('reservations.index', compact('resevations'));
    }
    
    
   

    
}

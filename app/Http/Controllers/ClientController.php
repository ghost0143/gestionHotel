<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    public function createForm(){
        return view('clients.create');
    }

    public function create(Request $request){
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'sexe' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'pays' => 'required',
            'type' => 'required',
            'carte' => 'required',
            'profession' => 'required',
        ]);
    
        $client = Client::where([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
        ])->first();
    
        if ($client) {
            return redirect()->route('client.createForm')->with('danger', 'Ce client existe déjà.');
        }
    
        $client = new Client();
    
        $client->nom = $data['nom'];
        $client->prenom = $data['prenom'];
        $client->email = $data['email'];
        $client->sexe = $data['sexe'];
        $client->telephone = $data['telephone'];
        $client->adresse = $data['adresse'];
        $client->pays = $data['pays'];
        $client->carte = $data['carte'];
        $client->type = $data['type'];
        $client->profession = $data['profession'];
        $client->user_id = Auth::user()->id;
    
        $client->save();
    
        return redirect()->route('client.index')->with('success', 'Client créé avec succès.');
    }
    
    public function view($id){
        $client = Client::findOrFail($id);
        return view('clients.view', compact('client'));
    }

    public function edit($id){
        $client = Client::findOrFail($id);
        return view('clients.update', compact('client'));
    }

    public function update(Request $request, $id){
        $client = Client::findOrFail($id);
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'sexe' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'pays' => 'required',
            'type' => 'required',
            'carte' => 'required',
            'profession' => 'required',
        ]);


        $client->nom = $data['nom'];
        $client->prenom = $data['prenom'];
        $client->email = $data['email'];
        $client->sexe = $data['sexe'];
        $client->telephone = $data['telephone'];
        $client->adresse = $data['adresse'];
        $client->pays = $data['pays'];
        $client->carte = $data['carte'];
        $client->type = $data['type'];
        $client->profession = $data['profession'];
        $client->user_id = Auth::user()->id;

        $client->save();

        return redirect()->route('client.index')->with('success', 'Client modifier avec succès');

    }

    public function destroy($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index')->with('danger', 'Le client a été supprimé');


    }

    public function search(Request $request){
        $nom = $request->input('nom');

        $clients = Client::where('nom', 'LIKE', "%$nom%")->simplePaginate(10);
        return view('clients.index', compact('clients'));
    }
}

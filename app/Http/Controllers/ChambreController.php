<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chambre;

class ChambreController extends Controller
{
    public function index(){
        $chambres = Chambre::latest()->get();
        return view('chambres.index', compact('chambres'));
    }

    public function formCreate(){
        return view('chambres.create');
    }

    public function create(Request $request){
        $data = $request->validate([
            'numero' => 'required|unique:chambres,numero',
            'type' => 'required',
            'systeme' => 'required',
            'vu' => 'required',
            'tarif' => 'required',
        ]);

        $chambre = new Chambre();

        $chambre->numero = $data['numero'];
        $chambre->type = $data['type'];
        $chambre->systeme = $data['systeme'];
        $chambre->vu = $data['vu'];
        $chambre->tarif = $data['tarif'];
        $chambre->user_id = Auth::user()->id;

        $chambre->save();

        return redirect()->route('chambre.index')->with('success', 'La chambre a été créer avec succès');
    }

    public function edit($id){
        $chambre = Chambre::findOrFail($id);
        return view('chambres.update', compact('chambre'));
    }

    public function update(Request $request, $id){
        $chambre = Chambre::findOrFail($id);
        $data = $request->validate([
            'numero' => 'required|unique:chambres,numero,' . $id,
            'type' => 'required',
            'systeme' => 'required',
            'vu' => 'required',
            'tarif' => 'required',
            'status' => 'required',
        ]);


        $chambre->numero = $data['numero'];
        $chambre->type = $data['type'];
        $chambre->systeme = $data['systeme'];
        $chambre->vu = $data['vu'];
        $chambre->tarif = $data['tarif'];
        $chambre->status = $data['status'];
        $chambre->user_id = Auth::user()->id;

        $chambre->save();

        return redirect()->route('chambre.index')->with('success', 'La chambre a été modifier avec succès');

    }


    public function destroy($id){
        $client = Chambre::findOrFail($id);
        $client->delete();
        return redirect()->route('chambre.index')->with('danger', 'Le client a été supprimé');


    }

    public function search(Request $request){
        $numero = $request->input('numero');

        $chambres = Chambre::where('numero', 'LIKE', "%$numero%")->simplePaginate(10);
        return view('chambres.index', compact('chambres'));
    }
}

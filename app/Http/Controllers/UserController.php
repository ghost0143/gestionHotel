<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function form()
    {
        return view('users.create');
    }

    public function create(Request $request)
    {
        $dataValidate = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
            'password_confirm' => 'required|min:6|same:password',
            'role' => 'required'
        ]);

        if ($dataValidate['password'] == $dataValidate['password_confirm']) {
            $user = new User();
            $user->nom = $dataValidate['nom'];
            $user->prenom = $dataValidate['prenom'];
            $user->username = $dataValidate['username'];
            $user->email = $dataValidate['email'];
            $user->password = Hash::make($dataValidate['password']);
            $user->role = $dataValidate['role'];
            $user->save();
            return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créer avec succès');
        } else {
            return redirect()->route('utilisateur.formCreate')->with('danger', 'Les mots de passe ne sont pas conforme');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $dataValidate = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',

        ]);

            $user->nom = $dataValidate['nom'];
            $user->prenom = $dataValidate['prenom'];
            $user->username = $dataValidate['username'];
            $user->email = $dataValidate['email'];
            $user->role = $dataValidate['role'];


        $user->update();
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur modifier avec succès');


    }

    public function editPassword(){
        return view('users.editPassword');
    }

    public function updatePassword(Request $request){
        $data = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
            'confirmPassword' => 'required|min:6|same:password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->route('edit.password') ->with('danger', 'Ancien mot de passe incorrect.');
        }

        $user->password = Hash::make($data['password']);
        $user->save();
    }
}

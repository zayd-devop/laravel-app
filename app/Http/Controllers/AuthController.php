<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash; // Pour le mot de passe
use Illuminate\Support\Facades\Session; // Pour les sessions

class AuthController extends Controller
{
    // 1. Afficher formulaire inscription
    public function inscription() {
        return view('auth.inscription');
    }

    // 2. Traiter l'inscription
    public function enregistrer(Request $request) {
        $request->validate([
            'login' => 'required|unique:comptes',
            'mot_passe' => 'required|min:6',
            'profil' => 'required'
        ]);

        Compte::create([
            'login' => $request->login,
            'mot_passe' => Hash::make($request->mot_passe), // Toujours hasher !
            'profil' => $request->profil
        ]);

        return redirect()->route('login')->with('success', 'Compte créé, connectez-vous.');
    }

    // 3. Afficher formulaire connexion
    public function formLogin() {
        return view('auth.connexion');
    }

    // 4. Traiter la connexion (Vérification manuelle)
    public function login(Request $request) {
        $request->validate([
            'login' => 'required',
            'mot_passe' => 'required'
        ]);

        // Chercher l'utilisateur
        $compte = Compte::where('login', $request->login)->first();

        // Vérifier si compte existe ET si mot de passe correspond
        if ($compte && Hash::check($request->mot_passe, $compte->mot_passe)) {

            // SAUVEGARDE EN SESSION
            Session::put('user_id', $compte->id);
            Session::put('user_login', $compte->login);
            Session::put('user_profil', $compte->profil);

            return redirect()->route('profil');
        }

        return back()->with('error', 'Login ou mot de passe incorrect.');
    }

    // 5. Deconnexion
    public function logout() {
        Session::flush(); // Vide toutes les sessions
        return redirect()->route('login');
    }

    // 6. Page Profil (Tableau de bord)
    public function profil() {
        // Vérifier si connecté
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }
        return view('auth.profil');
    }
}

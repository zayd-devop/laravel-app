<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    // Afficher la liste
    public function index()
    {
        $stagiaires = Stagiaire::all(); 
        return view('stagiaires.index', compact('stagiaires'));
    }

    // Afficher le formulaire de création 
    public function create()
    {
        return view('stagiaires.create'); 
    }

    // Enregistrer le stagiaire 
    public function store(Request $request)
    {
        // Méthode 2: Create (plus rapide)
        Stagiaire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age
        ]);
        
        return redirect()->route('stagiaires.index')
                         ->with('success', 'Stagiaire ajouté !');
    }

    // Afficher un stagiaire spécifique 
    public function show(Stagiaire $stagiaire)
{
        return view('stagiaires.show', compact('stagiaire')); // [cite: 159]
    }

    // Afficher le formulaire d'édition 
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', ['stagiaire' => $stagiaire]); 
    }

    // Mettre à jour les données 
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->age = $request->age;
        $stagiaire->save(); 

        return redirect()->route('stagiaires.index'); 
    }

    // Supprimer un stagiaire
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete(); 
        return redirect()->route('stagiaires.index');
    }
}

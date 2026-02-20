<?php

namespace App\Http\Controllers;

use App\Events\LivreUpdated;
use App\Models\Auteur;
use App\Models\Livre;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'titre' => 'required',
        'annee_publication' => 'required|integer',
        'nombre_pages' => 'required|integer',
        'auteur_id' => 'required|exists:auteurs,id',
    ]);
    Livre::create($request->all());
    return redirect()->route('livres.index')->with('success', 'Livre ajouté');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
    $auteurs = Auteur::all();
    return view('livres.edit', compact('livre', 'auteurs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre) {
        $request->validate(['titre' => 'required']);
        $livre->update($request->all());
        // event(new LivreUpdated($livre));
        return redirect()->route('livres.index');
    }
    public function destroy(Livre $livre) {
        $livre->delete();
        return redirect()->route('livres.index');
    }

}

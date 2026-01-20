<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Commandes = Commande::all();
        return view('commandes.index',compact('Commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Commande::create([
            'id'=>$request->id,
            'date'=>$request->date,
            'client_id'=>$request->client_id
        ]);
        return redirect()->route('commandes.index')
            ->with('success','Commamnde Ajoute !');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $Commandes)
    {
        return view('commandes.edit', ['commande' => $Commandes]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $Commandes)
    {
        $Commandes->id = $request->id;
        $Commandes->date = $request->date;
        $Commandes->client_id = $request->client_id;
        $Commandes->save(); 
        return redirect()->route('stagiaires.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $Commandes)
    {    
        $Commandes->delete(); 
        return redirect()->route('commandes.index');
    }
}

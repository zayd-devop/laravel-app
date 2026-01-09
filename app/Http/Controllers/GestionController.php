<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function calcul($nombre) 
    {
        if (!view()->exists('calcul')) {
            abort(404,'la vue n existe pas !');
        }
        return view('calcul',['nombre'=>$nombre]);
        }
    }

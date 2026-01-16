<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{
    public function index(){
        $films=DB::table('films')->get();
        dd($films);
    }
    
}

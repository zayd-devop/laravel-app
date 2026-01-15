<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route pour tester

Route::get('/q1',function (){
    $films=DB::table('films')->get();
    return $films;
});
Route::get('/q2',function (){
    $films=DB::table('films')->get(['titre']);
    return $films;
});
Route::get('/q3',function (){
    $films=DB::table('films')->where('annee','>=','1995')->get(['titre','annee']);
    return $films;
});
Route::get('/q4',function (){
    $films=DB::table('acteurs')->where('nom','like','D%')->get();
    return $films;
});
Route::get('/q5',function (){
    $films=DB::table('films')->where('duree','>','2:00:00')->get();
    return $films;
});
Route::get('/q6',function (){
    $films=DB::table('films')->whereBetween('annee',[1970,2000])->get(['titre','annee']);
    return $films;
});
Route::get('/ex3-q1',function(){
    DB::table('films')->where('id', 1)->update(['titre'=>'God Father']);
});
Route::get('/ex3-q2',function(){
    DB::table('films')->where('id',2)->update(['titre'=>'Spider-Man','genre'=>'Marvel']);
});
Route::get('/ex3-q3',function(){
    DB::table('films')->where('annee','<','1990')->update(['genre'=>'Classique']);
});
Route::get('/ex4-q1',function(){
    DB::table('films')->where('id',3)->delete();
});
Route::get('/ex4-q2',function(){
    DB::table('films')->where('annee','<',1980)->delete();
});
Route::get('/ex5-q1',function(){
    $count=DB::table('films')->count();
    return $count;
});
// Route::get('ex5-q2',function(){
//     $moyenne=DB::table('films')->avg('duree');
//     return $moyenne;
// });
Route::get('/ex5-q2',function(){
    $moyenne=DB::table('films')->avg(DB::raw('TIME_TO_SEC(duree)'));
    return gmdate('H:i:s',$moyenne);
});
Route::get('/ex5-q3',function(){
    $moyenneAnnee=DB::table('films')->avg('annee');
    return $moyenneAnnee;
});
Route::get('/ex5-q4',function(){
    $nbFilms=DB::table('participations')->where('acteur_id',1)->count();
    return $nbFilms;
});
Route::get('/ex6-q1',function(){
    $films = DB::table('films')->paginate(10);
    return $films;
});

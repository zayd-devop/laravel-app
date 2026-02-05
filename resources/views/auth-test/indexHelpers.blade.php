@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Test de l'API Auth Laravel</h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Via Facade (Auth::)</h3>
            <ul>
                <li>Check : <strong>{{ Auth::check() ? 'Connecté' : 'Invité' }}</strong></li>
                <li>ID : <strong>{{ Auth::id() ?? 'N/A' }}</strong></li>
            </ul>
        </div>

        <div class="col-md-6">
            <h3>Via Helper (auth())</h3>
            <ul>
                <li>Check : <strong>{{ auth()->check() ? 'Connecté' : 'Invité' }}</strong></li>
                <li>ID : <strong>{{ auth()->id() ?? 'N/A' }}</strong></li>
            </ul>
        </div>
    </div>

    <hr>

    <h3>Détails de l'utilisateur (auth()->user()) :</h3>
    @if(auth()->check())
        <pre>{{ print_r(auth()->user()->toArray(), true) }}</pre>
    @else
        <p>Aucun utilisateur connecté pour afficher l'objet.</p>
    @endif
</div>
@endsection
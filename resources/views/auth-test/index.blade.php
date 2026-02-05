@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Test de l'API Auth Laravel</h1>
    <ul>
        <li>Auth::check() :
            <strong>{{ Auth::check() ? 'Bienvenue': 'Veuillez vous connecter' }}</strong>
        </li>
        <li>Auth::id() :
            <strong>{{ Auth::id() ?? 'Aucun' }}</strong>
        </li>

        <li>Auth::user() :
            <pre>{{ print_r(Auth::user(), true) }}</pre>
        </li>
    </ul>
    @auth
        <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
    @endauth
</div>
@endsection

{{-- Etape 9 --}}
{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <h1>Test de l'API Auth Laravel</h1>
    <ul>
        <li>Auth::check() :
            @if (Auth::check())
                <h4>Bienvenue, {{ Auth::user()->name }}</h4>
            @else 
            <h4>Veuillez vous connecter</h4>
            @endif
        </li>
        <li>Auth::id() :
            <strong>{{ Auth::id() ?? 'Aucun' }}</strong>
        </li>

        <li>Auth::user() :
            <pre>{{ print_r(Auth::user(), true) }}</pre>
        </li>
    </ul>
    @auth
        <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
    @endauth
</div>
@endsection --}}

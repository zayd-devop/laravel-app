<form method="POST" action="{{ route('auth.manual.login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button type="submit">Connexion</button>
</form>
@if ($errors->has('email'))
    <p style="color:red;">{{ $errors->first('email') }}</p>
@endif
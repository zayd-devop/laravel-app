<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bulletin</h1>
    <strong>Nom etudiant : </strong>{{ $nom }} <br>
    <strong>Moyenne : </strong>{{ $note }}<br>
    @if ($note >= 10)
        @php
            $decision = 'Admis'
        @endphp
    @elseif ($note>=7 && $note <10)
        @php
            $decision = 'Rattrapage'
        @endphp
    @else
        @php
            $decision = 'non Admis'
        @endphp
    @endif
    <strong>Decision : </strong>{{ $decision }}
</body>
</html>
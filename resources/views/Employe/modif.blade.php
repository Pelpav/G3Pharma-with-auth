@extends('layouts.dashboard')

@section('contenu')
    <h1>Modifier Employé</h1>
    <form action="{{ route('updateemploye', ['id' => $employe->id]) }}" method="POST">
        @csrf
        @method('POST') <!-- Utilisez POST ou PATCH selon votre configuration de route -->
        <label for="first_name">Prénom:</label>
        <input type="text" id="first_name" name="first_name" value="{{ $employe->first_name }}"><br><br>

        <label for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name" value="{{ $employe->last_name }}"><br><br>

        <!-- Autres champs avec les valeurs actuelles de l'employé -->

        <button type="submit">Modifier Employé</button>
    </form>
@endsection

@extends('layouts.dashboard')


@section('contenu')
    <h1>Add Employe</h1>
    <form action="{{ route('employe.create') }}" method="POST">
        @csrf
        <label for="first_name">Prénom:</label>
        <input type="text" id="first_name" name="first_name"><br><br>

        <label for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name"><br><br>

        <label for="age">Âge:</label>
        <input type="number" id="age" name="age"><br><br>

        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select><br><br>

        <label for="tel">Numéro de téléphone:</label>
        <input type="tel" id="tel" name="tel"><br><br>

        <label for="adresse">Adresse:</label>
        <textarea id="adresse" name="adresse"></textarea><br><br>

        <label for="situation">Situation:</label>
        <input type="text" id="situation" name="situation"><br><br>

        <label for="service">En service:</label>
        <input type="checkbox" id="service" name="service" value="1"><br><br>

        <label for="status">Statut:</label>
        <input type="text" id="status" name="status"><br><br>

        <button type="submit">Ajouter Employé</button>
    </form>
@endsection

@extends('layouts.dashboard')


@section('contenu')
    <h1>Add Medicaments</h1>
    <form action="{{ route('medicament.create') }}" method="POST">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="price">Price :</label>
        <input type="number" id="price" name="price"><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock"><br><br>

        <button type="submit">Ajouter Medicaments</button>
    </form>
@endsection

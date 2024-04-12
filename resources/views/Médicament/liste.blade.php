@extends('layouts.dashboard')


@section('contenu')
    <h1>Liste des Médicaments</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicaments as $medicament)
                <tr>
                    <td>{{ $medicament->name }}</td>
                    <td>{{ $medicament->price }}</td>
                    <td>{{ $medicament->description }}</td>
                    <td>{{ $medicament->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

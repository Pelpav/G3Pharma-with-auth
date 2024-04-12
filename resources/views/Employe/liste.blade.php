@extends('layouts.dashboard')


@section('contenu')
    <h1>Liste des Employés</h1>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Âge</th>
                <th>Sexe</th>
                <th>Téléphone</th>
                <th>Situation</th>
                <th>En Service</th>
                <th>Adresse</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr>
                    <td>{{ $employe->first_name }}</td>
                    <td>{{ $employe->last_name }}</td>
                    <td>{{ $employe->age }}</td>
                    <td>{{ $employe->sexe }}</td>
                    <td>{{ $employe->tel }}</td>
                    <td>{{ $employe->situation }}</td>
                    <td>{{ $employe->service }}</td>
                    <td>{{ $employe->adresse }}</td>
                    <td>{{ $employe->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

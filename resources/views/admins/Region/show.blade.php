@extends('layouts.superAdmin')

@section('content')

    <style>
        /* Style pour le titre */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style pour le bouton */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        a {
    color: #007bff;
    text-decoration: none;
}
    </style>

    <h1>{{ $region->name }}</h1>
    
    <h2>Liste des filières</h2>
    <table>
        <thead>
            <tr>
                <th>Nom de la filière</th>
                <th>Action</th> <!-- Ajout d'une colonne pour l'action -->
            </tr>
        </thead>
        <tbody>
            @forelse ($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->Nom }}</td> 
                    <td>
                        <!-- Lien pour voir les membres de la filière -->
                        <a href="{{ route('filiere.membres', ['filiere' => $filiere->id]) }}">Voir les Membres</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Aucune filière associée à cette région.</td> <!-- Colspan ajusté pour tenir compte de la nouvelle colonne -->
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <!-- Bouton pour ajouter une nouvelle filière -->
    <a href="{{ route('filiere.createFiliere') }}" class="btn btn-primary">Ajouter une filière</a>
@endsection

@extends('layouts.superAdmin')

@section('content')
<style>
/* styles.css */

/* Style pour le titre */
h1 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style pour la table */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* Style pour les liens */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Style pour les boutons */
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
}

.btn:hover {
    background-color: #0056b3;
}
</style>
    <h1>Liste des régions du Maroc</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Région</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $region)
                <tr>
                    <td>{{ $region->name }}</td>
                    <td>
                        <a href="{{ route('region.show', ['region_id' => $region->id]) }}">Voir les filières</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bouton pour ajouter une nouvelle filière -->
    <a href="{{ route('filiere.createFiliere')}}" class="btn btn-primary">Ajouter une filière</a>
@endsection

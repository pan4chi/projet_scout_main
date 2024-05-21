
@extends('layouts.superAdmin')

@section('content')

    <style>
        /* Ajoutez vos styles CSS ici */

        /* Style du bouton Ajouter un Membre */
        .btn-add-member {
            background-color: #4CAF50; /* Vert */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        /* Style du titre Liste des membres */
        .title {
            color: #4CAF50; /* Vert */
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style du tableau */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style des cellules du tableau */
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Style des en-têtes de colonne du tableau */
        .table th {
            background-color: #f2f2f2; /* Gris clair */
            color: #4CAF50; /* Vert */
        }

        /* Style des boutons d'action */
        .btn-action {
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Style du bouton Afficher */
        .btn-action.show {
            background-color: #008CBA; /* Bleu clair */
            color: white;
        }

        /* Style du bouton Modifier */
        .btn-action.edit {
            background-color: #ffc107; /* Jaune */
            color: black;
        }

        /* Style du bouton Supprimer */
        .btn-action.delete {
            background-color: #dc3545; /* Rouge */
            color: white;
        }

        /* Hover sur les boutons d'action */
        .btn-action:hover {
            opacity: 0.8;
        }
    </style>

    <div>
        <!-- Bouton Ajouter un Membre -->
        <a href="{{ route('members_super.create') }}" class="btn-add-member">Ajouter un Membre</a> 
    </div>
   
    <h2>{{ $filiere->nom }}</h2>
    <h1 class="title">Liste des membres</h1>

    <!-- Conteneur du tableau -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">État civil</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher les membres -->
                @foreach($membres as $membre)
                <tr>
                    <td>{{ $membre->Nom_complet_en_arabe }}</td>
                    <td>{{ $membre->Sexe }}</td>
                    <td>{{ $membre->État_civil }}</td>
                    <td>{{ $membre->Date_de_naissance }}</td>
                    <td>
                     <div>
                            <a href="{{ route('members_super.show', $membre) }}" class="btn-action show">Afficher</a>
                            <a href="{{ route('members_super.edit', $membre) }}" class="btn-action edit">Modifier</a>
                            <form action="{{ route('members_super.destroy', $membre) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action delete">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection


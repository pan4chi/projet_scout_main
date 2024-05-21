

@section('content')
<style>
    /* Styles pour la mise en page */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        background-color: rgb(120, 230, 120);
        padding: 10px;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    th {
        background-color: green;
        color: white;
        font-weight: bold;
    }

    td {
        text-align: left;
    }

    button {
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    a {
        color: white;
        text-decoration: none;
    }

    .edit-button {
        background-color: yellow;
        margin-right: 5px;
    }

    .delete-button {
        background-color: red;
    }

    .show-button {
        background-color: blue;
        margin-right: 5px;
    }

    /* Style pour le bouton "Ajouter une activité" */
    #add-activity-btn {
        background-color: green;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<div class="container">
    <h1>Liste des activités</h1>

    @if ($activities->isEmpty())
        <p>Aucune activité disponible pour le moment.</p>
        <a href="{{ route('filiere.activity.addform') }}" id="add-activity-btn">Ajouter une Activité</a>
    @else
        <a href="{{ route('filiere.activity.addform') }}" id="add-activity-btn">Ajouter une Activité</a>
        <table>
            <thead>
                <tr>
                    <th>La branche</th>
                    <th>Entité</th>
                    <th>Le siège central</th>
                    <th>Type d'activité</th>
                    <th>Date d'activité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->La_branche }}</td>
                        <td>{{ $activity->Entité }}</td>
                        <td>{{ $activity->Le_siège_central }}</td>
                        <td>{{ $activity->type_d_activité }}</td>
                        <td>{{ $activity->date_d_activity }}</td>
                        <td>
                            <button class="show-button">
                                <a href="{{ route('filiere.activity.show', $activity) }}">Afficher</a>
                            </button>
                            <button class="edit-button">
                                <a href="{{ route('filiere.activity.editform', $activity) }}">Modifier</a>
                            </button>
                             <form action="{{ route('filiere.activity.delete', $activity) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete-button" type="submit">Supprimer</button>
                            </form>
                         </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@extends('AdminFiliere.index')

@section('content')
<style>
    .data {
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

    ul {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    li {
        margin-bottom: 15px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    li:last-child {
        border-bottom: none;
    }

    label {
        font-weight: bold;
        margin-right: 10px;
    }

    a, button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-right: 10px;
    }

    button:hover {
        background-color: #45a049;
    }

    form {
        display: inline-block;
    }
</style>

<div class="data">
    <h1>Détails de l'activité</h1>

    <ul>
        <li><label>La branche :</label> {{ $activity->La_branche }}</li>
        <li><label>Entité :</label> {{ $activity->Entité }}</li>
        <li><label>Le siège central :</label> {{ $activity->Le_siège_central }}</li>
        <li><label>Type d'activité :</label> {{ $activity->type_d_activité }}</li>
        <li><label>Date d'activité :</label> {{ $activity->date_d_activity }}</li>
        <li><label>Nature de l'activité :</label> {{ $activity->Nature_de_l_activité }}</li>
        <li><label>Domaine de l'activité :</label> {{ $activity->Domaine_de_l_activité }}</li>
        <li><label>Nombre de bénéficiaires masculins :</label> {{ $activity->Nombre_de_bénéficiaires_masculins }}</li>
        <li><label>Nombre de bénéficiaires féminins :</label> {{ $activity->Nombre_de_bénéficiaires_féminins }}</li>
        <li><label>La population cible :</label> {{ $activity->La_population_cible }}</li>
        <li><label>Lieu de l'activité :</label> {{ $activity->Lieu_de_l_activité }}</li>
        <li><label>Durée de l'activité :</label> {{ $activity->Durée_de_l_activité }}</li>
        <li><label>Rapport d'activité :</label> {{ $activity->Rapport_d_activité }}</li>
        <li><label>Les membres du personnel impliqués :</label> 
            <ul>
                @foreach($activity->Members as $member)
                    <li>{{ $member->Nom_complet_en_arabe }}</li>
                @endforeach
            </ul>
        </li>

        <li><label>Les frais de l'activité :</label> {{ $activity->Les_frais_de_l_activité }}</li>
        <li><label>Les Revenus de l'activité :</label> {{ $activity->Les_Revenus_de_l_activité }}</li>
        <li><label>Location :</label> {{ $activity->location }}</li>
        <li><label>ID de l'association :</label> {{ $activity->association_id }}</li>
    </ul>

    <a href="{{ route('filiere.activity.editform', $activity) }}">Modifier</a>
    <form action="{{ route('filiere.activity.delete', $activity) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</div>
@endsection

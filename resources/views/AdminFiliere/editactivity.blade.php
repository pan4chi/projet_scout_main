@extends('AdminFiliere.index')

@section('content')
<style>
    /* Styles communs */
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

    form {
        margin-top: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        width: calc(100% - 22px); /* Pour tenir compte de la bordure */
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<div class="container">
@if ($errors->any())
    <div class="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <h1>Modifier l'activité</h1>

    <form action="{{ route('filiere.activity.edit', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="La_branche">La branche :</label>
        <input type="text" name="La_branche" value="{{ $activity->La_branche }}">

        <label for="Entité">Entité :</label>
        <input type="text" name="Entité" value="{{ $activity->Entité }}">

        <label for="Le_siège_central">Le siège central :</label>
        <input type="text" name="Le_siège_central" value="{{ $activity->Le_siège_central }}">

        <label for="type_d_activité">Type d'activité :</label>
        <input type="text" name="type_d_activité" value="{{ $activity->type_d_activité }}">

        <label for="date_d_activity">Date d'activité :</label>
        <input type="date" name="date_d_activity" value="{{ $activity->date_d_activity }}">

        <label for="Nature_de_l_activité">Nature de l'activité :</label>
        <input type="text" name="Nature_de_l_activité" value="{{ $activity->Nature_de_l_activité }}">

        <label for="Domaine_de_l_activité">Domaine de l'activité :</label>
        <input type="text" name="Domaine_de_l_activité" value="{{ $activity->Domaine_de_l_activité }}">

        <label for="Nombre_de_bénéficiaires_masculins">Nombre de bénéficiaires masculins :</label>
        <input type="number" name="Nombre_de_bénéficiaires_masculins" value="{{ $activity->Nombre_de_bénéficiaires_masculins }}">

        <label for="Nombre_de_bénéficiaires_féminins">Nombre de bénéficiaires féminins :</label>
        <input type="number" name="Nombre_de_bénéficiaires_féminins" value="{{ $activity->Nombre_de_bénéficiaires_féminins }}">

        <label for="La_population_cible">La population cible :</label>
        <input type="text" name="La_population_cible" value="{{ $activity->La_population_cible }}">

        <label for="Lieu_de_l_activité">Lieu de l'activité :</label>
        <input type="text" name="Lieu_de_l_activité" value="{{ $activity->Lieu_de_l_activité }}">

        <label for="Durée_de_l_activité">Durée de l'activité :</label>
        <input type="text" name="Durée_de_l_activité" value="{{ $activity->Durée_de_l_activité }}">

        <label for="Rapport_d_activité">Rapport d'activité :</label>
        <textarea name="Rapport_d_activité">{{ $activity->Rapport_d_activité }}</textarea>

        <label for="Les_membres_du_personnel_impliqués">Les membres du personnel impliqués :</label>
        <select name="Les_membres_du_personnel_impliqués[]" multiple>
            @foreach($activity->filiere->Members as $membre)
                <option value="{{ $membre->id }}">{{ $membre->Nom_complet_en_arabe }}</option>
            @endforeach
        </select>


        <label for="Les_frais_de_l_activité">Les frais de l'activité :</label>
        <input type="text" name="Les_frais_de_l_activité" value="{{ $activity->Les_frais_de_l_activité }}">

        <label for="Les_Revenus_de_l_activité">Les Revenus de l'activité :</label>
        <input type="text" name="Les_Revenus_de_l_activité" value="{{ $activity->Les_Revenus_de_l_activité }}">

        <label for="location">Location :</label>
        <input type="text" name="location" value="{{ $activity->location }}">

        <label for="association_id">ID de l'association :</label>
        <input type="number" name="association_id" value="{{ $activity->association_id }}">

        <label for="fillier">Filière :</label>
        <input type="number" name="fillier" value="{{ Auth::user()->id - 50 }}" readonly >]
            

        <button type="submit">Modifier l'activité</button>
    </form>
</div>
@endsection

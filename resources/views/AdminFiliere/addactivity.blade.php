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
        font-weight: bold;
    }

    td {
        text-align: left;
    }

    button {
        padding: 5px 10px;
        cursor: pointer;
    }

    /* Styles spécifiques au formulaire */
    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
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
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    /* Styles pour l'impression */
    @media print {
        body * {
            visibility: hidden;
        }
        .printable-area, .printable-area * {
            visibility: visible;
        }
        .printable-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none;
        }
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

    <h1>Formulaire pour ajouter une activité</h1>

    <div class="printable-area">
    <form action="{{ route('filiere.activity.add') }}" method="POST">
            @csrf

            <table>
                <th for="La_branche">La branche :</th>
                <td for="La_branche"><input type="text" name="La_branche" value="{{ old('La_branche') }}" required></td>
            </tr>
            <tr>
                <th for="Entité">Entité :</th>
                <td for="Entité"><input type="text" name="Entité" value="{{ old('Entité') }}" required></td>
            </tr>

            <tr>
                <th for="Le_siège_central">Le siège central :</th>
                <td for="Le_siège_central"><input type="text" name="Le_siège_central" value="{{ old('Le_siège_central') }}" required></td>
            </tr>
            <tr>
                <th for="type_d_activité">Type d'activité :</th>
                <td for="type_d_activité"><input type="text" name="type_d_activité" value="{{ old('type_d_activité') }}" required></td>
            </tr>
            <tr>
                <th for="date_d_activity">Date d'activité :</th>
                <td for="date_d_activity"><input type="date" name="date_d_activity" value="{{ old('date_d_activity') }}" required></td>
            </tr>
            <tr>
                <th for="Nature_de_l_activité">Nature de l'activité :</th>
                <td for="Nature_de_l_activité"><input type="text" name="Nature_de_l_activité" value="{{ old('Nature_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="Domaine_de_l_activité">Domaine de l'activité :</th>
                <td for="Domaine_de_l_activité"><input type="text" name="Domaine_de_l_activité" value="{{ old('Domaine_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="Nombre_de_bénéficiaires_masculins">Nombre de bénéficiaires masculins :</th>
                <td for="Nombre_de_bénéficiaires_masculins"><input type="number" name="Nombre_de_bénéficiaires_masculins" value="{{ old('Nombre_de_bénéficiaires_masculins') }}" required></td>
            </tr>
            <tr>
                <th for="Nombre_de_bénéficiaires_féminins">Nombre de bénéficiaires féminins :</th>
                <td for="Nombre_de_bénéficiaires_féminins"><input type="number" name="Nombre_de_bénéficiaires_féminins" value="{{ old('Nombre_de_bénéficiaires_féminins') }}" required></td>
            </tr>
            <tr>
                <th for="La_population_cible">La population cible :</th>
                <td for="La_population_cible"><input type="text" name="La_population_cible" value="{{ old('La_population_cible') }}" required></td>
            </tr>
            <tr>
                <th for="Lieu_de_l_activité">Lieu de l'activité :</th>
                <td for="Lieu_de_l_activité"><input type="text" name="Lieu_de_l_activité" value="{{ old('Lieu_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="Durée_de_l_activité">Durée de l'activité :</th>
                <td for="Durée_de_l_activité"><input type="text" name="Durée_de_l_activité" value="{{ old('Durée_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="Rapport_d_activité">Rapport d'activité :</th>
                <td for="Rapport_d_activité"><textarea name="Rapport_d_activité" required>{{ old('Rapport_d_activité') }}</textarea></td>
            </tr>
            <tr>
                <th for="Les_membres_du_personnel_impliqués">Les membres du personnel impliqués :</th>
                <td for="Les_membres_du_personnel_impliqués">
                    @foreach($members as $member)
                    <label>
                        <input type="checkbox" name="Les_membres_du_personnel_impliqués[]" value="{{ $member->id }}">
                        {{ $member->Nom_complet_en_arabe }}
                    </label><br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th for="Les_frais_de_l_activité">Les frais de l'activité :</th>
                <td for="Les_frais_de_l_activité"><input type="text" name="Les_frais_de_l_activité" value="{{ old('Les_frais_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="Les_Revenus_de_l_activité">Les Revenus de l'activité :</th>
                <td for="Les_Revenus_de_l_activité"><input type="text" name="Les_Revenus_de_l_activité" value="{{ old('Les_Revenus_de_l_activité') }}" required></td>
            </tr>
            <tr>
                <th for="location">Location :</th>
                <td for="location"><input type="text" name="location" value="{{ old('location') }}" required></td>
            </tr>
            <tr>
                <th for="association_id">ID de l'association :</th>
                <td for="association_id"><input type="number" name="association_id" value="{{ old('association_id') }}" required></td>
            </tr>
            <tr>
                <th for="fillier">Filière :</th>
                <td for="fillier"><input type="number" name="fillier" value="{{ Auth::user()->id - 50 }}" readonly required></td>
            </tr>


            </table>
            <button type="submit">Ajouter l'activité</button>
        </form>
    </div>

    <button onclick="printForm()">Imprimer le formulaire</button>

    <script>
        document.getElementById('membres_select').addEventListener('change', function() {
            var selectedMemberId = this.value;
            document.getElementById('member_id_input').value = selectedMemberId;
        });

        function printForm() {
            window.print();
        }
    </script>
</div>
@endsection

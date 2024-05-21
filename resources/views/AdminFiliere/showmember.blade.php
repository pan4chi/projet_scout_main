@extends('AdminFiliere.index')

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

    a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #007bff;
    }
</style>

<div class="container">
    <h1>Member Details</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <!-- Chaque champ est affiché dans une ligne du tableau -->
        <tr>
            <td>Nom complet en arabe:</td>
            <td>{{ $member->getAttribute('Nom_complet_en_arabe') }}</td>
        </tr>
        <tr>
            <td>Sexe:</td>
            <td>{{ $member->getAttribute('Sexe') }}</td>
        </tr>
        <tr>
            <td>État civil:</td>
            <td>{{ $member->getAttribute('État_civil') }}</td>
        </tr>
        <tr>
            <td>Nombre d'enfants:</td>
            <td>{{ $member->getAttribute('Nombre_d_enfants') }}</td>
        </tr>
        <tr>
            <td>Date de naissance:</td>
            <td>{{ $member->getAttribute('Date_de_naissance') }}</td>
        </tr>
        <tr>
            <td>Lieu de naissance:</td>
            <td>{{ $member->getAttribute('Lieu_de_naissance') }}</td>
        </tr>
        <tr>
            <td>L'adresse:</td>
            <td>{{ $member->getAttribute('L_adresse') }}</td>
        </tr>
        <tr>
            <td>La ville:</td>
            <td>{{ $member->getAttribute('La_ville') }}</td>
        </tr>
        <tr>
            <td>CIN:</td>
            <td>{{ $member->getAttribute('CIN') }}</td>
        </tr>
        <tr>
            <td>Numéro de téléphone:</td>
            <td>{{ $member->getAttribute('Numéro_de_téléphone') }}</td>
        </tr>
        <tr>
            <td>Numéro WhatsApp:</td>
            <td>{{ $member->getAttribute('Numéro_WhatsApp') }}</td>
        </tr>
        <tr>
            <td>Facebook:</td>
            <td>{{ $member->getAttribute('Facebook') }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $member->getAttribute('Email') }}</td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>{{ $member->getAttribute('Password') }}</td>
        </tr>
        <tr>
            <td>Niveau d'étude:</td>
            <td>{{ $member->getAttribute('niveau_d_étude') }}</td>
        </tr>
        <tr>
            <td>Spécialisation:</td>
            <td>{{ $member->getAttribute('Spécialisation') }}</td>
        </tr>
        <tr>
            <td>Niveau de langue arabe:</td>
            <td>{{ $member->getAttribute('Niveau_de_langue_arabe') }}</td>
        </tr>
        <tr>
            <td>Niveau de langue amazighe:</td>
            <td>{{ $member->getAttribute('Niveau_de_langue_amazighe') }}</td>
        </tr>
        <tr>
            <td>Niveau de langue française:</td>
            <td>{{ $member->getAttribute('Niveau_de_langue_française') }}</td>
        </tr>
        <tr>
            <td>Niveau de langue anglais:</td>
            <td>{{ $member->getAttribute('NLA') }}</td>
        </tr>
        <tr>
            <td>Niveau de langue espagnole:</td>
            <td>{{ $member->getAttribute('Niveau_de_langue_espagnole') }}</td>
        </tr>
        <tr>
            <td>Autres langues:</td>
            <td>{{ $member->getAttribute('Autres_langues') }}</td>
        </tr>
        <tr>
            <td>Situation professionnelle:</td>
            <td>{{ $member->getAttribute('Situation_professionnelle') }}</td>
        </tr>
        <tr>
            <td>Spécialité professionnelle:</td>
            <td>{{ $member->getAttribute('Spécialité_professionnelle') }}</td>
        </tr>
        <tr>
            <td>Années d'expérience:</td>
            <td>{{ $member->getAttribute('Années_d_expérience') }}</td>
        </tr>
        <tr>
            <td>Region:</td>
            <td>{{ $member->getAttribute('region_id') }}</td>
        </tr>
        <tr>
            <td>Date d'adhésion à l'association:</td>
            <td>{{ $member->getAttribute('date_d_adhésion_à_l_association') }}</td>
        </tr>
        <tr>
            <td>Membre actif Dans l'association:</td>
            <td>{{ $member->getAttribute('membre_actif_Dans_l_association') }}</td>
        </tr>
        <tr>
            <td>Responsabilité au sein de l'association:</td>
            <td>{{ $member->getAttribute('Responsabilité_au_sein_de_l_association') }}</td>
        </tr>
        <tr>
            <td>Formation acquise:</td>
            <td>{{ $member->getAttribute('Formation_acquise') }}</td>
        </tr>
        <tr>
            <td>Fillier:</td>
            <td>{{ $member->getAttribute('fillier') }}</td>
        </tr>
        <tr>
            <td>Prise de mesure pour les vêtements:</td>
            <td>{{ $member->getAttribute('Prise_de_mesure_pour_les_vêtements') }}</td>
        </tr>
        <tr>
            <td>L'appartenance politique:</td>
            <td>{{ $member->getAttribute('L_appartenance_politique') }}</td>
        </tr>
        <tr>
            <td>Date d'adhésion à parti:</td>
            <td>{{ $member->getAttribute('date_d_adhésion_à_parti') }}</td>
        </tr>
        <tr>
            <td>Membre actif dans le parti:</td>
            <td>{{ $member->getAttribute('Membre_actif_dans_le_parti') }}</td>
        </tr>
        <tr>
            <td>La fonction au sein du parti:</td>
            <td>{{ $member->getAttribute('La_fonction_au_sein_du_parti') }}</td>
        </tr>
    </table>
    <!-- Lien pour retourner à la liste des membres -->
    <a href="{{ route('filiere.member.list') }}">Retour à la liste des membres</a>
</div>
@endsection

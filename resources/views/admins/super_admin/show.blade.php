@extends('layouts.superAdmin')

@section('content')
    <style>
        /* Styles CSS personnalisés */

        /* Conteneur principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa; /* Couleur de fond */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre douce */
        }

        /* Titre */
        .title {
            font-size: 24px;
            color: #007bff; /* Couleur bleue */
            margin-bottom: 20px;
        }

        /* Tableau */
        .member-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Cellules de titre */
        .member-table th {
            background-color: #007bff; /* Couleur bleue */
            color: #fff; /* Texte blanc */
            padding: 10px;
            text-align: left;
        }

        /* Cellules de données */
        .member-table td {
            border: 1px solid #ddd; /* Bordure grise */
            padding: 10px;
        }

        /* Lien de retour */
        .back-link {
            display: inline-block;
            color: #007bff; /* Couleur bleue */
            text-decoration: none;
            margin-top: 20px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <!-- Titre -->
        <h1 class="title">Détails du Membre</h1>
        
        <!-- Tableau des détails du membre -->
        <table class="member-table">
            <tr>
                <th>Champs</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td><strong>Nom complet en arabe:</strong></td>
                <td>{{ $member->Nom_complet_en_arabe }}</td>
            </tr>
            <tr>
                <td><strong>Sexe:</strong></td>
                <td>{{ $member->Sexe }}</td>
            </tr>
            <!-- Ajout des autres champs ici -->
            <tr>
                <td><strong>État civil:</strong></td>
                <td>{{ $member->État_civil }}</td>
            </tr>
            <tr>
                <td><strong>Nombre d'enfants:</strong></td>
                <td>{{ $member->Nombre_d_enfants }}</td>
            </tr>
            <tr>
                <td><strong>Date de naissance:</strong></td>
                <td>{{ $member->Date_de_naissance }}</td>
            </tr>
            <tr>
                <td><strong>Lieu de naissance:</strong></td>
                <td>{{ $member->Lieu_de_naissance }}</td>
            </tr>
            <tr>
                <td><strong>L'adresse:</strong></td>
                <td>{{ $member->L_adresse }}</td>
            </tr>
            <tr>
                <td><strong>La ville:</strong></td>
                <td>{{ $member->La_ville }}</td>
            </tr>
            <tr>
                <td><strong>CIN:</strong></td>
                <td>{{ $member->CIN }}</td>
            </tr>
            <tr>
                <td><strong>Numéro de téléphone:</strong></td>
                <td>{{ $member->Numéro_de_téléphone }}</td>
            </tr>
            <tr>
                <td><strong>Numéro WhatsApp:</strong></td>
                <td>{{ $member->Numéro_WhatsApp }}</td>
            </tr>
            <tr>
                <td><strong>Facebook:</strong></td>
                <td>{{ $member->Facebook }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $member->Email }}</td>
            </tr>
            <tr>
                <td><strong>Password:</strong></td>
                <td>{{ $member->Password }}</td>
            </tr>
            <tr>
                <td><strong>niveau d'étude:</strong></td>
                <td>{{ $member->niveau_d_étude }}</td>
            </tr>
            <tr>
                <td><strong>Spécialisation:</strong></td>
                <td>{{ $member->Spécialisation }}</td>
            </tr>
            <tr>
                <td><strong>Niveau de langue arabe:</strong></td>
                <td>{{ $member->Niveau_de_langue_arabe }}</td>
            </tr>
            <tr>
                <td><strong>Niveau de langue amazighe:</strong></td>
                <td>{{ $member->Niveau_de_langue_amazighe }}</td>
            </tr>
            <tr>
                <td><strong>Niveau de langue française:</strong></td>
                <td>{{ $member->Niveau_de_langue_française }}</td>
            </tr>
            <tr>
                <td><strong>niveau de langue anglaise:</strong></td>
                <td>{{ $member->NLA }}</td>
            </tr>
            <tr>
                <td><strong>Niveau de langue espagnole:</strong></td>
                <td>{{ $member->Niveau_de_langue_espagnole }}</td>
            </tr>
            <tr>
                <td><strong>Autres langues:</strong></td>
                <td>{{ $member->Autres_langues }}</td>
            </tr>
            <tr>
                <td><strong>Situation professionnelle:</strong></td>
                <td>{{ $member->Situation_professionnelle }}</td>
            </tr>
            <tr>
                <td><strong>Spécialité professionnelle:</strong></td>
                <td>{{ $member->Spécialité_professionnelle }}</td>
            </tr>
            <tr>
                <td><strong>Années d'expérience:</strong></td>
                <td>{{ $member->Années_d_expérience }}</td>
            </tr>
            <tr>
                <td><strong>Region:</strong></td>
                <td>{{ $member->region_id }}</td>
            </tr>
            <tr>
                <td><strong>date d'adhésion à l'association:</strong></td>
                <td>{{ $member->date_d_adhésion_à_l_association }}</td>
            </tr>
            <tr>
                <td><strong>membre actif Dans l'association:</strong></td>
                <td>{{ $member->membre_actif_Dans_l_association }}</td>
            </tr>
            <tr>
                <td><strong>Responsabilité au sein de l'association:</strong></td>
                <td>{{ $member->Responsabilité_au_sein_de_l_association }}</td>
            </tr>
            <tr>
                <td><strong>Formation acquise:</strong></td>
                <td>{{ $member->Formation_acquise }}</td>
            </tr>
            <tr>
                <td><strong>fillier:</strong></td>
                <td>{{ $member->fillier }}</td>
            </tr>
            <tr>
                <td><strong>Prise de mesure pour les vêtements:</strong></td>
                <td>{{ $member->Prise_de_mesure_pour_les_vêtements }}</td>
            </tr>
            
            </tr>
        </table>

        <!-- Lien de retour -->
        <a href="{{ route('members_super.list') }}" class="back-link">Retour à la liste des membres</a>
    </div>
@endsection

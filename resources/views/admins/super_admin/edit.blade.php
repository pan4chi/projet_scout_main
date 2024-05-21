@extends('layouts.superAdmin')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formulaire pour Modifier un Membre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            margin: 50px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select,
        input[type="number"],
        input[type="range"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Titre de la page -->
        <h1 class="page-title"> Formulaire pour Modifier un Membre </h1>

        <!-- Formulaire d'édition du membre -->
        <form action="{{ route('members_super.update', $member->id) }}" method="POST" class="member-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nom_complet_en_arabe">Nom complet </label>
                <input type="text" id="Nom_complet_en_arabe" name="Nom_complet_en_arabe" value="{{ $member->Nom_complet_en_arabe }}" maxlength="40">
            </div>

            <div class="form-group">
                <label for="Sexe">Sexe</label>
                <select id="Sexe" name="Sexe">
                    <option value="Male" {{ $member->Sexe == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $member->Sexe == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="État_civil">État civil</label>
                <input type="text" id="État_civil" name="État_civil" value="{{$member->getAttribute('État_civil') }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="Nombre_d_enfants">Nombre d'enfants</label>
                <input type="number" id="Nombre_d_enfants" name="Nombre_d_enfants" value="{{ $member->getAttribute('Nombre_d_enfants') }}" min="0" max="10">
            </div>

            <div class="form-group">
                <label for="Date_de_naissance">Date de naissance </label>
                <input type="date" id="Date_de_naissance" name="Date_de_naissance" value="{{ $member->getAttribute('Date_de_naissance') }}" placeholder="mm/dd/yyyy">
            </div>

            <div class="form-group">
                <label for="Lieu_de_naissance">Lieu de naissance</label>
                <input type="text" id="Lieu_de_naissance" name="Lieu_de_naissance" value="{{ $member->getAttribute('Lieu_de_naissance') }}" maxlength="50">
            </div>

            <div class="form-group">
                <label for="L_adresse">Adresse</label>
                <input type="text" id="L_adresse" name="L_adresse" value="{{ $member->getAttribute('L_adresse') }}" maxlength="150">
            </div>

            <div class="form-group">
                <label for="La_ville">Ville</label>
                <input type="text" id="La_ville" name="La_ville" value="{{ $member->getAttribute('La_ville') }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="CIN">CIN</label>
                <input type="text" id="CIN" name="CIN" value="{{ $member->CIN }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="Numéro_de_téléphone">Numéro de téléphone</label>
                <input type="text" id="Numéro_de_téléphone" name="Numéro_de_téléphone" value="{{ $member->getAttribute('Numéro_de_téléphone') }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="Numéro_WhatsApp">Numéro de WhatsApp</label>
                <input type="text" id="Numéro_WhatsApp" name="Numéro_WhatsApp" value="{{ $member->getAttribute('Numéro_WhatsApp') }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="Facebook">Facebook</label>
                <input type="text" id="Facebook" name="Facebook" value="{{ $member->Facebook }}" maxlength="20">
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email" value="{{ $member->Email }}" maxlength="90">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" id="Password" name="Password" value="{{ $member->Password }}" minlength="6" maxlength="60">
            </div>

            <div class="form-group">
                <label for="niveau_d_étude">Niveau d'étude</label>
                <input type="text" id="niveau_d_étude" name="niveau_d_étude" value="{{ $member->getAttribute('niveau_d_étude') }}" maxlength="30">
            </div>

            <div class="form-group">
                <label for="Spécialisation">Spécialisation</label>
                <input type="text" id="Spécialisation" name="Spécialisation" value="{{ $member->Spécialisation }}" maxlength="50">
            </div>

            <div class="form-group">
                <label for="Niveau_de_langue_arabe">Niveau de langue arabe</label>
                <input type="range" id="Niveau_de_langue_arabe" name="Niveau_de_langue_arabe" value="{{ $member->getAttribute('Niveau_de_langue_arabe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_arabe')">
                <span id="Niveau_de_langue_arabe">{{ old('Niveau_de_langue_arabe') }}</span>
            </div>

            <!-- Nouveaux champs ajoutés -->
            <div class="form-group">
                <label for="Niveau_de_langue_amazighe">Niveau de langue amazighe</label>
                <input type="range" id="Niveau_de_langue_amazighe" name="Niveau_de_langue_amazighe" value="{{ $member->getAttribute('Niveau_de_langue_amazighe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_amazighe')">
                <span id="Niveau_de_langue_amazighe">{{ old('Niveau_de_langue_amazighe') }}</span>
            </div>

            <div class="form-group">
                <label for="Niveau_de_langue_française">Niveau de langue française</label>
                <input type="range" id="Niveau_de_langue_française" name="Niveau_de_langue_française" value="{{ $member->getAttribute('Niveau_de_langue_française') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_française')">
                <span id="Niveau_de_langue_française">{{ old('Niveau_de_langue_française') }}</span>
            </div>

            <div class="form-group">
                <label for="NLA">Niveau de langue anglaise</label>
                <input type="range" id="NLA" name="NLA" value="{{ old('Niveau_de_langue_anglais', $member->getAttribute('Niveau_de_langue_anglais')) }}" min="1" max="5" oninput="updateTextInput(this.value, 'NLA')">
                <span id="NLA">{{ old('NLA') }}</span>
            </div>

            <div class="form-group">
                <label for="Niveau_de_langue_espagnole">Niveau de langue espagnole</label>
                <input type="range" id="Niveau_de_langue_espagnole" name="Niveau_de_langue_espagnole" min="1" max="5" value="{{$member->getAttribute('Niveau_de_langue_espagnole') }}"  oninput="updateTextInput(this.value, 'spanishLevel')">
                <span id="spanishLevel">{{ old('Niveau_de_langue_espagnole') }}</span>
            </div>

            <div class="form-group">
                <label for="Autres_langues">Autres langues</label>
                <input type="text" id="Autres_langues" name="Autres_langues" value="{{ $member->getAttribute('Autres_langues') }}" maxlength="140" placeholder='Quelle langue ?'>
            </div>

            <div class="form-group">
                <label for="Situation_professionnelle">Situation professionnelle</label>
                <input type="text" id="Situation_professionnelle" name="Situation_professionnelle" value="{{ $member->getAttribute('Situation_professionnelle') }}" maxlength="40">
            </div>

            <div class="form-group">
                <label for="Spécialité_professionnelle">Spécialité professionnelle</label>
                <input type="text" id="Spécialité_professionnelle" name="Spécialité_professionnelle" value="{{ $member->getAttribute('Spécialité_professionnelle')}}" maxlength="40">
            </div>

            <div class="form-group">
                <label for="Années_d_expérience">Année d'expérience</label>
                <input type="number" id="Années_d_expérience" name="Années_d_expérience" value="{{ $member->getAttribute('Années_d_expérience') }}" min="0" max="30">
            </div>

            <div class="form-group">
                <label for="region_id">Région</label>
                <input type="text" id="region_id" name="region_id" value="{{ $member->region_id }}" maxlength="60">
            </div>

            <div class="form-group">
                <label for="date_d_adhésion_à_l_association">Date d'adhésion à l'association </label>
                <input type="date" id="date_d_adhésion_à_l_association" name="date_d_adhésion_à_l_association" value="{{ $member->getAttribute('date_d_adhésion_à_l_association') }}" placeholder="mm/dd/yyyy">
            </div>

            <div class="form-group">
                <label for="membre_actif_Dans_l_association">Membre actif dans l'association</label>
                <select id="membre_actif_Dans_l_association" name="membre_actif_Dans_l_association">
                    <option value="Yes" {{ $member->getAttribute('membre_actif_Dans_l_association') === 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ $member->getAttribute('membre_actif_Dans_l_association') === 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Responsabilité_au_sein_de_l_association">Responsabilité au sein de l'association</label>
                <input type="text" id="Responsabilité_au_sein_de_l_association" name="Responsabilité_au_sein_de_l_association" value="{{ $member->getAttribute('Responsabilité_au_sein_de_l_association') }}" maxlength="100">
            </div>

            <div class="form-group">
                <label for="Formation_acquise">Formation acquise</label>
               
              <select id="Formation_acquise" name="Formation_acquise">
                  <option value="Yes" {{ $member->Formation_acquise == 'Yes' ? 'selected' : '' }}>Yes</option>
                  <option value="No" {{ $member->Formation_acquise == 'No' ? 'selected' : '' }}>No</option>
              </select>
          
                </div>

            <div class="form-group">
                <label for="fillier">Filière</label>
                <input type="text" id="fillier" name="fillier" value="{{ $member->fillier }}" maxlength="80">
            </div>

            <div class="form-group">
                <label for="Prise_de_mesure_pour_les_vêtements">Prise de mesure pour les vêtements</label>
                <input type="text" id="Prise_de_mesure_pour_les_vêtements" name="Prise_de_mesure_pour_les_vêtements" value="{{ $member->getAttribute('Prise_de_mesure_pour_les_vêtements') }}" maxlength="6">
            </div>

            

            <!-- Bouton de soumission -->
            <button type="submit">Modifier le Membre</button>
        </form>
    </div>
</body>
</html>
@endsection
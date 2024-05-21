@extends('layouts.superAdmin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <head>
        <style>
            @media print {
                /* Cacher les éléments non nécessaires à l'impression */
                body * {
                    visibility: hidden;
                }
                .printableArea, .printableArea * {
                    visibility: visible;
                }
                .printableArea {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    padding: 0;
                    margin: 0;
                }
                /* Styliser le tableau pour l'impression */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 12px;
                }
                th, td {
                    padding: 5px;
                    text-align: left;
                    border: 1px solid #000;
                }
                h2 {
                    background-color: #fff;
                    color: #000;
                    text-align: center;
                }
            }
        </style>
    </head>

    <div class="printableArea">
        <center> 
            <h2>Formulaire pour créer un Nouveau Membre</h2>
            <button onclick="window.print()" style="background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Imprimer</button>
        </center>

        <form action="{{ route('members_super.store') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Champs</th>
                        <th>Informations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom complet </td>
                        <td><input type="text" name="Nom_complet_en_arabe" value="{{ old('Nom_complet_en_arabe') }}" maxlength="40"></td>
                    </tr>
                    <tr>
                        <td>Sexe</td>
                        <td>
                            <select name="Sexe">
                                <option value="Male" {{ old('Sexe') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('Sexe') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>État civil</td>
                        <td><input type="text" name="État_civil" value="{{ old('État_civil') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>Nombre d'enfants</td>
                        <td><input type="number" name="Nombre_d_enfants" value="{{ old('Nombre_d_enfants') }}" min="0" max="10"></td>
                    </tr>
                    <tr>
                        <td>Date de naissance </td>
                        <td><input type="date" name="Date_de_naissance" value="{{ old('Date_de_naissance') }}"></td>
                    </tr>
                    <tr>
                        <td>Lieu de naissance</td>
                        <td><input type="text" name="Lieu_de_naissance" value="{{ old('Lieu_de_naissance') }}" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><input type="text" name="L_adresse" value="{{ old('L_adresse') }}" maxlength="150"></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td><input type="text" name="La_ville" value="{{ old('La_ville') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>CIN</td>
                        <td><input type="text" name="CIN" value="{{ old('CIN') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>Numéro de téléphone</td>
                        <td><input type="text" name="Numéro_de_téléphone" value="{{ old('Numéro_de_téléphone') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>Numéro de WhatsApp</td>
                        <td><input type="text" name="Numéro_WhatsApp" value="{{ old('Numéro_WhatsApp') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td><input type="text" name="Facebook" value="{{ old('Facebook') }}" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="Email" value="{{ old('Email') }}" maxlength="90"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="Password" value="{{ old('Password') }}" minlength="6" maxlength="60"></td>
                    </tr>
                    <tr>
                        <td>Niveau d'étude</td>
                        <td><input type="text" name="niveau_d_étude" value="{{ old('niveau_d_étude') }}" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>Spécialisation</td>
                        <td><input type="text" name="Spécialisation" value="{{ old('Spécialisation') }}" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>Niveau de langue arabe</td>
                        <td>
                            <input type="range" name="Niveau_de_langue_arabe" value="{{ old('Niveau_de_langue_arabe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_arabe')">
                            <span id="Niveau_de_langue_arabe">{{ old('Niveau_de_langue_arabe') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Niveau de langue amazighe</td>
                        <td>
                            <input type="range" name="Niveau_de_langue_amazighe" value="{{ old('Niveau_de_langue_amazighe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_amazighe')">
                            <span id="Niveau_de_langue_amazighe">{{ old('Niveau_de_langue_amazighe') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Niveau de langue française</td>
                        <td>
                            <input type="range" name="Niveau_de_langue_française" value="{{ old('Niveau_de_langue_française') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_française')">
                            <span id="Niveau_de_langue_française">{{ old('Niveau_de_langue_française') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Niveau de langue anglaise</td>
                        <td>
                            <input type="range" name="NLA" value="{{ old('NLA') }}" min="1" max="5" oninput="updateTextInput(this.value, 'NLA')">
                            <span id="NLA">{{ old('NLA') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Niveau de langue espagnole</td>
                        <td>
                            <input type="range" name="Niveau_de_langue_espagnole" min="1" max="5" value="{{ old('Niveau_de_langue_espagnole') }}" oninput="updateTextInput(this.value, 'spanishLevel')">
                            <span id="spanishLevel">{{ old('Niveau_de_langue_espagnole') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Autres Langues</td>
                        <td><input type="text" name="Autres_langues" value="{{ old('Autres_langues') }}" maxlength="140" placeholder='Quelle Langue ?'></td>
                    </tr>
                    <tr>
                        <td>Situation professionnelle</td>
                        <td><input type="text" name="Situation_professionnelle" value="{{ old('Situation_professionnelle') }}" maxlength="40"></td>
                    </tr>
                    <tr>
                        <td>Spécialité professionnelle</td>
                        <td><input type="text" name="Spécialité_professionnelle" value="{{ old('Spécialité_professionnelle') }}" maxlength="80"></td>
                    </tr>
                    <tr>
                        <td>Années d'expérience</td>
                        <td><input type="number" name="Années_d_expérience" value="{{ old('Années_d_expérience') }}" min="0" max="50"></td>
                    </tr>
                    <tr>
                        <td>Nom de l'association</td>
                        <td><input type="text" name="Nom_de_l_association" value="{{ old('Nom_de_l_association') }}" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td>Région</td>
                        <td>
                            <select name="region_id">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date d'adhésion à l'association</td>
                        <td><input type="date" name="date_d_adhésion_à_l_association" value="{{ old('date_d_adhésion_à_l_association') }}"></td>
                    </tr>
                    <tr>
                        <td>Membre actif dans l'association</td>
                        <td>
                            <select name="membre_actif_Dans_l_association">
                                <option value="Yes" {{ old('membre_actif_Dans_l_association') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('membre_actif_Dans_l_association') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Responsabilité au sein de l'association</td>
                        <td><input type="text" name="Responsabilité_au_sein_de_l_association" value="{{ old('Responsabilité_au_sein_de_l_association') }}" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td>Formation acquise</td>
                        <td>
                            <select name="Formation_acquise">
                                <option value="Yes" {{ old('Formation_acquise') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('Formation_acquise') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Filière</td>
                        <td>
                            <select name="fillier">
                                @foreach($filieres as $filiere)
                                    <option value="{{ $filiere->id }}">{{ $filiere->Nom }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Prise de mesure pour les vêtements</td>
                        <td><input type="text" name="Prise_de_mesure_pour_les_vêtements" value="{{ old('Prise_de_mesure_pour_les_vêtements') }}" maxlength="6"></td>
                    </tr>
                </tbody>
            </table>

            <center><button type="submit">Ajouter le Membre</button></center>
        </form>
    </div>

    <style>
        /* Existing styles */
        form {
            margin: 20px auto;
            width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        input[type=text], input[type=email], input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        h2 {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
        }

        button[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
    
    <script>
        function updateTextInput(val, targetId) {
            document.getElementById(targetId).innerText = val;
        }
    </script>
@endsection

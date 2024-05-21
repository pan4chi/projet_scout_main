@extends('AdminFiliere.index')

@section('content')

<style>
    /* Ajoutez vos styles CSS ici */

    /* Conteneur principal */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Titre de la page */
    h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      background-color: #28a745;
      color: white;
      padding: 10px;
      text-align: center;
      border-radius: 5px;
    }

    /* Formulaire */
    form {
      margin-top: 20px;
      padding: 20px;
      background-color: #f8f9fa;
      border: 2px solid #6c757d;
      border-radius: 5px;
    }

    /* Champs de saisie */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    /* Bouton de soumission */
    button[type="submit"] {
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Erreurs de formulaire */
    .alert {
      background-color: #dc3545;
      color: white;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    /* Style spécifique pour l'impression */
    @media print {
        body * {
            visibility: hidden;
        }
        .container, .container * {
            visibility: visible;
        }
        .container {
            position: absolute;
            left: 0;
            top: 0;
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

  <h1>Formulaire pour créer un nouveau membre</h1>

  <form action="{{ route('filiere.member.add') }}" method="POST">
    @csrf
    <table>
    <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
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
                  <td>
                      <select name="État_civil">
                          <option value="Marié" {{ old('État_civil') == 'Marié' ? 'selected' : '' }}>Marié</option>
                          <option value="Célibataire" {{ old('État_civil') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                          <option value="Divorcé" {{ old('État_civil') == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
                      </select>
                  </td>
              </tr>
                <tr>
                    <td>Nombre d'enfants</td>
                    <td><input type="number" name="Nombre_d_enfants" value="{{ old('Nombre_d_enfants') }}" min="0" max="10"></td>
                </tr>
                <tr>
                  <td>Date de naissance</td>
                  <td><input type="date" name="Date_de_naissance" value="{{ old('Date_de_naissance') }}"></td>
              </tr>
                <tr>
                    <td>Lieu de naissance</td>
                    <td><input type="text" name="Lieu_de_naissance" value="{{ old('Lieu_de_naissance') }}" maxlength="50"></td>
                </tr>
                <tr>
                    <td>L'adresse</td>
                    <td><input type="text" name="L_adresse" value="{{ old('L_adresse') }}" maxlength="150"></td>
                </tr>
                <tr>
                    <td>La ville</td>
                    <td><input type="text" name="La_ville" value="{{ old('La_ville') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>CIN</td>
                    <td><input type="text" name="CIN" value="{{ old('CIN') }}" maxlength="30"></td>
                </tr>
               <tr>
                  <td>Numéro de téléphone</td>
                  <td><input type="text" name="Numéro_de_téléphone" value="{{ old('Numéro_de_téléphone') }}" maxlength="10"></td>
              </tr>
                <tr>
                    <td>Numéro WhatsApp</td>
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
                  <td>
                      <select name="niveau_d_étude">
                          <option value="Bac+2" {{ old('niveau_d_étude') == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                          <option value="Bac+5" {{ old('niveau_d_étude') == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                          <option value="Bac+3" {{ old('niveau_d_étude') == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                          <option value="Lycée" {{ old('niveau_d_étude') == 'Lycée' ? 'selected' : '' }}>Lycée</option>
                          <option value="Collège" {{ old('niveau_d_étude') == 'Collège' ? 'selected' : '' }}>Collège</option>
                      </select>
                  </td>
              </tr>
                <tr>
                    <td>Spécialisation</td>
                    <td><input type="text" name="Spécialisation" value="{{ old('Spécialisation') }}" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Niveau de langue arabe</td>
                    <td><input type="range" name="Niveau_de_langue_arabe" value="{{ old('Niveau_de_langue_arabe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_arabe')">
                    <span id="Niveau_de_langue_arabe">{{ old('Niveau_de_langue_arabe') }}</span>
                </td>
                </tr>
                <tr>
                    <td>Niveau de langue amazighe</td>
                    <td><input type="range" name="Niveau_de_langue_amazighe" value="{{ old('Niveau_de_langue_amazighe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_amazighe')">
                    <span id="Niveau_de_langue_amazighe">{{ old('Niveau_de_langue_amazighe') }}</span>
                </td>
                </tr>
                <tr>
                    <td>Niveau de langue française</td>
                    <td><input type="range" name="Niveau_de_langue_française" value="{{ old('Niveau_de_langue_française') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_française')">
                    <span id="Niveau_de_langue_française">{{ old('Niveau_de_langue_française') }}</span>
                </td>
                </tr>
                <tr>
                    <td>Niveau de langue anglais</td>
                    <td><input type="range" name="NLA" value="{{ old('NLA') }}" min="1" max="5" oninput="updateTextInput(this.value, 'NLA')">
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
                        <td>Autres langues</td>
                        <td><input type="text" name="Autres_langues" value="{{ old('Autres_langues') }}" maxlength="140"></td>
                    </tr>
                    <tr>
                    <td>Situation professionnelle</td>
                    <td>
                        <select name="Situation_professionnelle">
                            <option value="Etudiant" {{ old('Situation_professionnelle') == 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                            <option value="Stagiaires" {{ old('Situation_professionnelle') == 'Stagiaires' ? 'selected' : '' }}>Stagiaires</option>
                            <option value="Salarie" {{ old('Situation_professionnelle') == 'Salarie' ? 'selected' : '' }}>Salarie</option>
                        </select>
                    </td>
                </tr>
                    <tr>
                        <td>Spécialité professionnelle</td>
                        <td><input type="text" name="Spécialité_professionnelle" value="{{ old('Spécialité_professionnelle') }}" maxlength="80"></td>
                    </tr>
                    <tr>
                        <td>Années d'expérience</td>
                        <td><input type="number" name="Années_d_expérience" value="{{ old('Années_d_expérience') }}" min="0" max="30"></td>
                    </tr>
                    <tr>
                    <td>Région</td>
                            
                            <td>
                                <select name="region_id">
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                          <td>Date d'adhésion à l'association</td>
                          <td><input type="date" name="date_d_adhésion_à_l_association" value="{{ old('date_d_adhésion_à_l_association') }}"></td>
                      </tr>
                    <tr>
                        <td>Membre Actif Dans l'association</td>
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
                                    <option value="{{ $filieres->id }}">{{ $filieres->Nom }}</option>
                                </select>
                            </td>

                    </tr>

                    <tr>
                        <td>Prise de mesure pour les vêtements</td>
                        <td><input type="text" name="Prise_de_mesure_pour_les_vêtements" value="{{ old('Prise_de_mesure_pour_les_vêtements') }}" maxlength="6"></td>
                    </tr>
                </tbody>
    </table>

    <button type="submit">Ajouter le membre</button>
  </form>
</div>
    <center> <button id="printButton">Imprimer le formulaire</button> </center> 

<script>
    document.getElementById("printButton").addEventListener("click", function() {
        window.print();
    });
</script>

@endsection


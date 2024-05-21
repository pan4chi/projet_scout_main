@extends('AdminFiliere.index')

@section('content')

<style>
    /* Add your CSS styles here */

    /* Main container */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Page title */
    h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      background-color: #28a745;
      color: white;
      padding: 10px;
      text-align: center;
      border-radius: 5px;
    }

    /* Form */
    form {
      margin-top: 20px;
      padding: 20px;
      background-color: #f8f9fa;
      border: 2px solid #6c757d;
      border-radius: 5px;
    }

    /* Input fields */
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

    /* Submit button */
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

    /* Form errors */
    .alert {
      background-color: #dc3545;
      color: white;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
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

  <h1>Formulaire pour éditer un membre</h1>

  <form action="{{ route('filiere.member.edit', $member->id) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
      <thead>
        <tr>
          <th>Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nom complet en arabe</td>
          <td><input type="text" name="Nom_complet_en_arabe" value="{{ $member->getAttribute('Nom_complet_en_arabe') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Sexe</td>
          <td>
            <select name="Sexe">
              <option value="Male" {{ $member->Sexe == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ $member->Sexe == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>État civil</td>
          <td>
            <select name="État_civil">
              <option value="Marié" {{ $member->État_civil == 'Marié' ? 'selected' : '' }}>Marié</option>
              <option value="Célibataire" {{ $member->État_civil == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
              <option value="Divorcé" {{ $member->État_civil == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nombre d'enfants</td>
          <td><input type="number" name="Nombre_d_enfants" value="{{ $member->getAttribute('Nombre_d_enfants') }}" min="0" max="10"></td>
        </tr>
        <tr>
          <td>Date de naissance (mm/dd/yyyy)</td>
          <td><input type="date" name="Date_de_naissance" value="{{ $member->getAttribute('Date_de_naissance') }}" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}"></td>
        </tr>
        <tr>
          <td>Lieu de naissance</td>
          <td><input type="text" name="Lieu_de_naissance" value="{{ $member->getAttribute('Lieu_de_naissance') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>L'adresse</td>
          <td><input type="text" name="L_adresse" value="{{ $member->getAttribute('L_adresse') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>La ville</td>
          <td><input type="text" name="La_ville" value="{{ $member->getAttribute('La_ville') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>CIN</td>
          <td><input type="text" name="CIN" value="{{ $member->CIN }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Numéro de téléphone</td>
          <td><input type="text" name="Numéro_de_téléphone" value="{{ $member->getAttribute('Numéro_de_téléphone') }}" maxlength="255" pattern="0[0-9]{9}"></td>
        </tr>
        <tr>
          <td>Numéro WhatsApp</td>
          <td><input type="text" name="Numéro_WhatsApp" value="{{ $member->getAttribute('Numéro_WhatsApp') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Facebook</td>
          <td><input type="text" name="Facebook" value="{{ $member->Facebook }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="Email" value="{{ $member->Email }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="Password" value="{{ $member->Password }}" minlength="8" maxlength="255"></td>
        </tr>
        <tr>
          <td>niveau d'étude</td>
          <td>
            <select name="niveau_d_étude">
              <option value="Bac+2" {{ $member->niveau_d_étude == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
              <option value="Bac+5" {{ $member->niveau_d_étude == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
              <option value="Bac+3" {{ $member->niveau_d_étude == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
              <option value="Lycée" {{ $member->niveau_d_étude == 'Lycée' ? 'selected' : '' }}>Lycée</option>
              <option value="Collège" {{ $member->niveau_d_étude == 'Collège' ? 'selected' : '' }}>Collège</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Spécialisation</td>
          <td><input type="text" name="Spécialisation" value="{{ $member->Spécialisation }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Niveau de langue arabe</td>
          <td><input type="range" name="Niveau_de_langue_arabe" value="{{ $member->getAttribute('Niveau_de_langue_arabe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_arabe')">
          <span id="Niveau_de_langue_arabe">{{ old('Niveau_de_langue_arabe') }}</span>
          </td>
        </tr>
        <tr>
          <td>Niveau de langue amazighe</td>
          <td><input type="range" name="Niveau_de_langue_amazighe" value="{{ $member->getAttribute('Niveau_de_langue_amazighe') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_amazighe')">
          <span id="Niveau_de_langue_amazighe">{{ old('Niveau_de_langue_amazighe') }}</span>
          </td>
        </tr>
        <tr>
          <td>Niveau de langue française</td>
          <td><input type="range" name="Niveau_de_langue_française" value="{{ $member->getAttribute('Niveau_de_langue_française') }}" min="1" max="5" oninput="updateTextInput(this.value, 'Niveau_de_langue_française')">
          <span id="Niveau_de_langue_française">{{ old('Niveau_de_langue_française') }}</span>
          </td>
        </tr>
        <tr>
          <td>Niveau de langue anglais</td>
          <td><input type="range" name="NLA" value="{{ old('Niveau_de_langue_anglais', $member->getAttribute('Niveau_de_langue_anglais')) }}" min="1" max="5" oninput="updateTextInput(this.value, 'NLA')">
          <span id="NLA">{{ old('NLA') }}</span>
          </td>
        </tr>
        <tr>
          <td>Niveau de langue espagnole</td>
          <td><input type="range" name="Niveau_de_langue_espagnole" value="{{ $member->getAttribute('Niveau_de_langue_espagnole') }}" min="1" max="5" oninput="updateTextInput(this.value, 'spanishLevel')">
          <span id="spanishLevel">{{ old('Niveau_de_langue_espagnole') }}</span>
          </td>
        </tr>
        <tr>
          <td>Autres langues</td>
          <td><input type="text" name="Autres_langues" value="{{ $member->getAttribute('Autres_langues') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Situation professionnelle</td>
          <td>
            <select name="Situation_professionnelle">
              <option value="Étudiant" {{ $member->Situation_professionnelle == 'Étudiant' ? 'selected' : '' }}>Étudiant</option>
              <option value="Stagiaire" {{ $member->Situation_professionnelle == 'Stagiaire' ? 'selected' : '' }}>Stagiaire</option>
              <option value="Salarié" {{ $member->Situation_professionnelle == 'Salarié' ? 'selected' : '' }}>Salarié</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Spécialité professionnelle</td>
          <td><input type="text" name="Spécialité_professionnelle" value="{{ $member->getAttribute('Spécialité_professionnelle') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Années d'expérience</td>
          <td><input type="number" name="Années_d_expérience" value="{{ $member->getAttribute('Années_d_expérience') }}" min="0" max="30"></td>
        </tr>
        <tr>
          <td>Region</td>
          <td><input type="text" name="Region" value="{{ $member->region_id }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Date d'adhésion à l'association (mm/dd/yyyy)</td>
          <td><input type="date" name="date_d_adhésion_à_l_association" value="{{ $member->getAttribute('date_d_adhésion_à_l_association') }}" placeholder="mm/dd/yyyy" min="{{ $member->Date_de_naissance }}"></td>
        </tr>
        <tr>
          <td>Membre actif Dans l'association</td>
          <td>
            <select name="membre_actif_Dans_l_association">
              <option value="Yes" {{ $member->membre_actif_Dans_l_association === 'Yes' ? 'selected' : '' }}>Yes</option>
              <option value="No" {{ $member->membre_actif_Dans_l_association === 'No' ? 'selected' : '' }}>No</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Responsabilité au sein de l'association</td>
          <td><input type="text" name="Responsabilité_au_sein_de_l_association" value="{{ $member->getAttribute('Responsabilité_au_sein_de_l_association') }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Formation acquise</td>
          <td>
              <select name="Formation_acquise">
                  <option value="Yes" {{ $member->Formation_acquise == 'Yes' ? 'selected' : '' }}>Yes</option>
                  <option value="No" {{ $member->Formation_acquise == 'No' ? 'selected' : '' }}>No</option>
              </select>
          </td>
        </tr>
        <tr>
          <td>Filière</td>
          <td><input type="text" name="filiere" value="{{ $member->filiere }}" maxlength="255"></td>
        </tr>
        <tr>
          <td>Prise de mesure pour les vêtements</td>
          <td><input type="text" name="Prise_de_mesure_pour_les_vêtements" value="{{ $member->getAttribute('Prise_de_mesure_pour_les_vêtements') }}" maxlength="255"></td>
        </tr>
       
          <td>association_id</td>
          <td><input type="text" name="association_id" value="{{ $member->getAttribute('association_id') }}" maxlength="255"></td>
        </tr>
      </tbody>
    </table>

    <button type="submit">Modifier le membre</button>
  </form>
</div>

@endsection

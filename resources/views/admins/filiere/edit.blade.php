@extends('layouts.fillier')

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
    <h1>Edit Member</h1>

    <form action="{{ route('fillier.update', $member->id) }}" method="POST">
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
                    <td><input type="text" name="Nom_complet_en_arabe" value="{{ $member->getAttribute('Nom complet en arabe') }}" maxlength="40"></td>
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
                    <td><input type="text" name="État_civil" value="{{$member->getAttribute('État civil') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Nombre d'enfants</td>
                    <td><input type="number" name="Nombre_d_enfants" value="{{ $member->getAttribute('Nombre d\'enfants') }}" min="0" max="10"></td>
                </tr>
                <tr>
                    <td>Date de naissance (mm/dd/yyyy)</td>
                    <td><input type="date" name="Date_de_naissance" value="{{ $member->getAttribute('Date de naissance') }}" placeholder="mm/dd/yyyy"></td>
                </tr>
                <tr>
                    <td>Lieu de naissance</td>
                    <td><input type="text" name="Lieu_de_naissance" value="{{ $member->getAttribute('Lieu de naissance') }}" maxlength="50"></td>
                </tr>
                <tr>
                    <td>L'adresse</td>
                    <td><input type="text" name="L_adresse" value="{{ $member->getAttribute('L\'adresse') }}" maxlength="150"></td>
                </tr>
                <tr>
                    <td>La ville</td>
                    <td><input type="text" name="La_ville" value="{{ $member->getAttribute('La ville') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>CIN</td>
                    <td><input type="text" name="CIN" value="{{ $member->CIN }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Numéro de téléphone</td>
                    <td><input type="text" name="Numéro_de_téléphone" value="{{ $member->getAttribute('Numéro de téléphone') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Numéro WhatsApp</td>
                    <td><input type="text" name="Numéro_WhatsApp" value="{{ $member->getAttribute('Numéro WhatsApp') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><input type="text" name="Facebook" value="{{ $member->Facebook }}" maxlength="20"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="Email" value="{{ $member->Email }}" maxlength="90"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Password" value="{{ $member->Password }}" minlength="6" maxlength="60"></td>
                </tr>
                <tr>
                    <td>niveau d'étude</td>
                    <td><input type="text" name="niveau_d_étude" value="{{ $member->getAttribute('niveau d\'étude') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Spécialisation</td>
                    <td><input type="text" name="Spécialisation" value="{{ $member->Spécialisation }}" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Niveau de langue arabe</td>
                    <td><input type="number" name="Niveau_de_langue_arabe" value="{{ $member->getAttribute('Niveau de langue arabe') }}" min="0" max="5"></td>
                </tr>
                <tr>
                    <td>Niveau de langue amazighe</td>
                    <td><input type="number" name="Niveau_de_langue_amazighe" value="{{ $member->getAttribute('Niveau de langue amazighe') }}" min="0" max="5"></td>
                </tr>
                <tr>
                    <td>Niveau de langue française</td>
                    <td><input type="number" name="Niveau_de_langue_française" value="{{ $member->getAttribute('Niveau de langue française') }}" min="0" max="5"></td>
                </tr>
                <tr>
                    <td>niveau de langue anglais</td>
                    <td><input type="number" name="NLA" value="{{  $member->getAttribute('Niveau de langue anglais') }}" min="0" max="5"></td>
                </tr>
                <tr>
                    <td>Niveau de langue espagnole</td>
                    <td><input type="number" name="Niveau_de_langue_espagnole" value="{{$member->getAttribute('Niveau de langue espagnole') }}" min="0" max="5"></td>
                </tr>
                <tr>
                    <td>Autres langues</td>
                    <td><input type="text" name="Autres_langues" value="{{ $member->getAttribute('Autres langues') }}" maxlength="140"></td>
                </tr>
                <tr>
                    <td>Situation professionnelle</td>
                    <td><input type="text" name="Situation_professionnelle" value="{{ $member->getAttribute('Situation professionnelle') }}" maxlength="40"></td>
                </tr>
                <tr>
                    <td>Spécialité professionnelle</td>
                    <td><input type="text" name="Spécialité_professionnelle" value="{{ $member->getAttribute('Spécialité professionnelle')}}" maxlength="40"></td>
                </tr>

                <tr>
                    <td>Années d'expérience</td>
                    <td><input type="number" name="Années_d_expérience" value="{{ $member->getAttribute('Années d\'expérience') }}" min="0" max="30"></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><input type="text" name="Region" value="{{ $member->Region }}" maxlength="60"></td>
                </tr>
                <tr>
                    <td>date d'adhésion à l'association (mm/dd/yyyy)</td>
                    <td><input type="date" name="date_d_adhésion_à_l_association" value="{{ $member->getAttribute('date d\'adhésion à l\'association') }}" placeholder="mm/dd/yyyy"></td>
                </tr>
                <tr>
                    <td>membre actif Dans l'association</td>
                    <td>
                        <select name="membre_actif_dans_l_association" >
                            <option value="Yes" {{ $member->getAttribute('membre actif Dans l\'association') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $member->getAttribute('membre actif Dans l\'association') == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Responsabilité au sein de l'association</td>
                    <td><input type="text" name="Responsabilité_au_sein_de_l_association" value="{{ $member->getAttribute('Responsabilité au sein de l\'association') }}" maxlength="100"></td>
                </tr>
                <tr>
                    <td>Formation acquise</td>
                    <td><input type="text" name="Formation_acquise" value="{{ $member->getAttribute('Formation acquise') }}" maxlength="56"></td>
                </tr>
                <tr>
                    <td>fillier</td>
                    <td><input type="text" name="fillier" value="{{ $member->fillier }}" maxlength="80"></td>
                </tr>
                <tr>
                    <td>Prise de mesure pour les vêtements</td>
                    <td><input type="text" name="Prise_de_mesure_pour_les_vêtements" value="{{ $member->getAttribute('Prise de mesure pour les vêtements') }}" maxlength="6"></td>
                </tr>
                <tr>
                    <td>L'appartenance politique</td>
                    <td><input type="text" name="L_appartenance_politique" value="{{ $member->getAttribute('L\'appartenance politique') }}" maxlength="60"></td>
                </tr>
                <tr>
                    <td>date d'adhésion à parti (mm/dd/yyyy)</td>
                    <td><input type="date" name="date_d_adhésion_à_parti" value="{{ $member->getAttribute('date d\'adhésion à parti')  }}" placeholder="mm/dd/yyyy"></td>
                </tr>
                <tr>
                    <td>Membre actif dans le parti</td>
                    <td>
                        <select name="Membre_actif_dans_le_parti">
                            <option value="Yes" {{ $member->getAttribute('Membre actif dans le parti')  == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $member->getAttribute('Membre actif dans le parti')  == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>La fonction au sein du parti</td>
                    <td><input type="text" name="La_fonction_au_sein_du_parti" value="{{  $member->getAttribute('La fonction au sein du parti')  }}" maxlength="80"></td>
                </tr>
            </tbody>
        </table>

        <button type="submit">Update Member</button>
    </form>
@endsection

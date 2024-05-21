@extends('layouts.region')
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
    <h1>Create New Member</h1>

    <form action="{{ route('Region.store') }}" method="POST">
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
                    <td>Nom complet en arabe</td>
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
                    <td>Date de naissance (mm/dd/yyyy)</td>
                    <td><input type="date" name="Date_de_naissance" value="{{ old('Date_de_naissance') }}" placeholder="mm/dd/yyyy"
                        {{-- pattern="\d{2}/\d{2}/\d{4}" --}}
                        ></td>
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
                    <td><input type="text" name="Numéro_de_téléphone" value="{{ old('Numéro_de_téléphone') }}" maxlength="30"></td>
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
                    <td>niveau d'étude</td>
                    <td><input type="text" name="niveau_d_étude" value="{{ old('niveau_d_étude') }}" maxlength="30"></td>
                </tr>
                <tr>
                    <td>Spécialisation</td>
                    <td><input type="text" name="Spécialisation" value="{{ old('Spécialisation') }}" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Niveau de langue arabe</td>
                    <td><input type="number" name="Niveau_de_langue_arabe" value="{{ old('Niveau_de_langue_arabe') }}" min="1" max="5"></td>
                </tr>
                <tr>
                    <td>Niveau de langue amazighe</td>
                    <td><input type="number" name="Niveau_de_langue_amazighe" value="{{ old('Niveau_de_langue_amazighe') }}" min="1" max="5"></td>
                </tr>
                <tr>
                    <td>Niveau de langue française</td>
                    <td><input type="number" name="Niveau_de_langue_française" value="{{ old('Niveau_de_langue_française') }}" min="1" max="5"></td>
                </tr>
                <tr>
                    <td>niveau de langue anglais</td>
                    <td><input type="number" name="NLA" value="{{ old('NLA') }}" min="1" max="5"></td>
                    </tr>
                    <tr>
                        <td>Niveau de langue espagnole</td>
                        <td><input type="number" name="Niveau_de_langue_espagnole" value="{{ old('Niveau_de_langue_espagnole') }}" min="1" max="5"></td>
                    </tr>
                    <tr>
                        <td>Autres langues</td>
                        <td><input type="text" name="Autres_langues" value="{{ old('Autres_langues') }}" maxlength="140"></td>
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
                        <td><input type="number" name="Années_d_expérience" value="{{ old('Années_d_expérience') }}" min="0" max="30"></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td><input type="text" name="Region" value="{{ old('Region') }}" maxlength="60"></td>
                    </tr>
                    <tr>
                        <td>date d'adhésion à l'association (mm/dd/yyyy)</td>
                        <td><input type="date" name="date_d_adhésion_à_l_association" value="{{ old('date_d_adhésion_à_l_association') }}" placeholder="mm/dd/yyyy"
                            {{-- pattern="\d{2}/\d{2}/\d{4}" --}}
                            ></td>
                    </tr>
                    <tr>
                        <td>membre actif Dans l'association</td>
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
                        <td><input type="text" name="Formation_acquise" value="{{ old('Formation_acquise') }}" maxlength="56"></td>
                    </tr>
                    <tr>
                        <td>filiere_id</td>
                        <td><input type="text" name="filiere_id" value="{{ old('filiere_id') }}" maxlength="80"></td>
                    </tr>
                    <tr>
                        <td>Prise de mesure pour les vêtements</td>
                        <td><input type="text" name="Prise_de_mesure_pour_les_vêtements" value="{{ old('Prise_de_mesure_pour_les_vêtements') }}" maxlength="6"></td>
                    </tr>
                    <tr>
                        <td>L'appartenance politique</td>
                        <td><input type="text" name="L_appartenance_politique" value="{{ old('L_appartenance_politique') }}" maxlength="60"></td>
                    </tr>
                    <tr>
                        <td>date d'adhésion à parti (mm/dd/yyyy)</td>
                        <td><input type="date" name="date_d_adhésion_à_parti" value="{{ old('date_d_adhésion_à_parti') }}" placeholder="mm/dd/yyyy"
                            {{-- pattern="\d{2}/\d{2}/\d{4}" --}}
                            ></td>
                    </tr>
                    <tr>
                        <td>Membre actif dans le parti</td>
                        <td>
                            <select name="Membre_actif_dans_le_parti">
                                <option value="Yes" {{ old('Membre_actif_dans_le_parti') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('Membre_actif_dans_le_parti') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>La fonction au sein du parti</td>
                        <td><input type="text" name="La_fonction_au_sein_du_parti" value="{{ old('La_fonction_au_sein_du_parti') }}" maxlength="80"></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit">Create Member</button>
        </form>
    @endsection

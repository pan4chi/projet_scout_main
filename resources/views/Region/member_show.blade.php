@extends('Region.adminregion')

@section('content')
    <div>
        <h1>Member Details</h1>
        <ul>
            <li><strong>Nom complet en arabe:</strong> {{ $member->getAttribute('Nom_complet_en_arabe') }}</li>
            <li><strong>Sexe:</strong> {{ $member->getAttribute('Sexe') }}</li>
            <li><strong>État civil:</strong> {{ $member->getAttribute('État_civil') }}</li>
            <li><strong>Nombre d'enfants:</strong> {{ $member->getAttribute('Nombre_d_enfants') }}</li>
            <li><strong>Date de naissance:</strong> {{ $member->getAttribute('Date_de_naissance') }}</li>
            <li><strong>Lieu de naissance:</strong> {{ $member->getAttribute('Lieu_de_naissance') }}</li>
            <li><strong>L'adresse:</strong> {{ $member->getAttribute('L_adresse') }}</li>
            <li><strong>La ville:</strong> {{ $member->getAttribute('La_ville') }}</li>
            <li><strong>CIN:</strong> {{ $member->getAttribute('CIN') }}</li>
            <li><strong>Numéro de téléphone:</strong> {{ $member->getAttribute('Numéro_de_téléphone') }}</li>
            <li><strong>Numéro WhatsApp:</strong> {{ $member->getAttribute('Numéro_WhatsApp') }}</li>
            <li><strong>Facebook:</strong> {{ $member->getAttribute('Facebook') }}</li>
            <li><strong>Email:</strong> {{ $member->getAttribute('Email') }}</li>
            <li><strong>Password:</strong> {{ $member->getAttribute('Password') }}</li>
            <li><strong>niveau d'étude:</strong> {{ $member->getAttribute('niveau_d_étude') }}</li>
            <li><strong>Spécialisation:</strong> {{ $member->getAttribute('Spécialisation') }}</li>
            <li><strong>Niveau de langue arabe:</strong> {{ $member->getAttribute('Niveau_de_langue_arabe') }}</li>
            <li><strong>Niveau de langue amazighe:</strong> {{ $member->getAttribute('Niveau_de_langue_amazighe') }}</li>
            <li><strong>Niveau de langue française:</strong> {{ $member->getAttribute('Niveau_de_langue_française') }}</li>
            <li><strong>niveau de langue anglais:</strong> {{ $member->getAttribute('NLA') }}</li>
            <li><strong>Niveau de langue espagnole:</strong> {{ $member->getAttribute('Niveau_de_langue_espagnole') }}</li>
            <li><strong>Autres langues:</strong> {{ $member->getAttribute('Autres_langues') }}</li>
            <li><strong>Situation professionnelle:</strong> {{ $member->getAttribute('Situation_professionnelle') }}</li>
            <li><strong>Spécialité professionnelle:</strong> {{ $member->getAttribute('Spécialité_professionnelle') }}</li>
            <li><strong>Années d'expérience:</strong> {{ $member->getAttribute('Années_d_expérience') }}</li>
            <li><strong>Region:</strong> {{ $member->getAttribute('region_id') }}</li>
            <li><strong>date d'adhésion à l'association:</strong> {{ $member->getAttribute('date_d_adhésion_à_l_association') }}</li>
            <li><strong>membre actif Dans l'association:</strong> {{ $member->getAttribute('membre_actif_Dans_l_association') }}</li>
            <li><strong>Responsabilité au sein de l'association:</strong> {{ $member->getAttribute('Responsabilité_au_sein_de_l_association') }}</li>
            <li><strong>Formation acquise:</strong> {{ $member->getAttribute('Formation_acquise') }}</li>
            <li><strong>fillier:</strong> {{ $member->getAttribute('fillier') }}</li>
            <li><strong>Prise de mesure pour les vêtements:</strong> {{ $member->getAttribute('Prise_de_mesure_pour_les_vêtements') }}</li>
            <li><strong>L'appartenance politique:</strong> {{ $member->getAttribute('L_appartenance_politique') }}</li>
            <li><strong>date d'adhésion à parti:</strong> {{ $member->getAttribute('date_d_adhésion_à_parti') }}</li>
            <li><strong>Membre actif dans le parti:</strong> {{ $member->getAttribute('Membre_actif_dans_le_parti') }}</li>
            <li><strong>La fonction au sein du parti:</strong> {{ $member->getAttribute('La_fonction_au_sein_du_parti') }}</li>
        </ul>
        <a href="{{ route('region.members') }}">Retour à la liste des membres</a>
    </div>
@endsection

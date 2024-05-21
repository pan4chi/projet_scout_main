@extends('layouts.fillier')

@section('content')
    <div>
        <h1>Member Details</h1>
        <ul>
            <li><strong>Nom complet en arabe:</strong> {{ $member->getAttribute('Nom complet en arabe') }}</li>
            <li><strong>Sexe:</strong> {{ $member->getAttribute('Sexe') }}</li>
            <li><strong>État civil:</strong> {{ $member->getAttribute('État civil') }}</li>
            <li><strong>Nombre d'enfants:</strong> {{ $member->getAttribute('Nombre d\'enfants') }}</li>
            <li><strong>Date de naissance:</strong> {{ $member->getAttribute('Date de naissance') }}</li>
            <li><strong>Lieu de naissance:</strong> {{ $member->getAttribute('Lieu de naissance') }}</li>
            <li><strong>L'adresse:</strong> {{ $member->getAttribute('L\'adresse') }}</li>
            <li><strong>La ville:</strong> {{ $member->getAttribute('La ville') }}</li>
            <li><strong>CIN:</strong> {{ $member->getAttribute('CIN') }}</li>
            <li><strong>Numéro de téléphone:</strong> {{ $member->getAttribute('Numéro de téléphone') }}</li>
            <li><strong>Numéro WhatsApp:</strong> {{ $member->getAttribute('Numéro WhatsApp') }}</li>
            <li><strong>Facebook:</strong> {{ $member->getAttribute('Facebook') }}</li>
            <li><strong>Email:</strong> {{ $member->getAttribute('Email') }}</li>
            <li><strong>Password:</strong> {{ $member->getAttribute('Password') }}</li>
            <li><strong>niveau d'étude:</strong> {{ $member->getAttribute('niveau d\'étude') }}</li>
            <li><strong>Spécialisation:</strong> {{ $member->getAttribute('Spécialisation') }}</li>
            <li><strong>Niveau de langue arabe:</strong> {{ $member->getAttribute('Niveau de langue arabe') }}</li>
            <li><strong>Niveau de langue amazighe:</strong> {{ $member->getAttribute('Niveau de langue amazighe') }}</li>
            <li><strong>Niveau de langue française:</strong> {{ $member->getAttribute('Niveau de langue française') }}</li>
            <li><strong>niveau de langue anglais:</strong> {{ $member->getAttribute('niveau de langue anglais') }}</li>
            <li><strong>Niveau de langue espagnole:</strong> {{ $member->getAttribute('Niveau de langue espagnole') }}</li>
            <li><strong>Autres langues:</strong> {{ $member->getAttribute('Autres langues') }}</li>
            <li><strong>Situation professionnelle:</strong> {{ $member->getAttribute('Situation professionnelle') }}</li>
            <li><strong>Spécialité professionnelle:</strong> {{ $member->getAttribute('Spécialité professionnelle') }}</li>
            <li><strong>Années d'expérience:</strong> {{ $member->getAttribute('Années d\'expérience') }}</li>
            <li><strong>Region:</strong> {{ $member->getAttribute('Region') }}</li>
            <li><strong>date d'adhésion à l'association:</strong> {{ $member->getAttribute('date d\'adhésion à l\'association') }}</li>
            <li><strong>membre actif Dans l'association:</strong> {{ $member->getAttribute('membre actif Dans l\'association') }}</li>
            <li><strong>Responsabilité au sein de l'association:</strong> {{ $member->getAttribute('Responsabilité au sein de l\'association') }}</li>
            <li><strong>Formation acquise:</strong> {{ $member->getAttribute('Formation acquise') }}</li>
            <li><strong>fillier:</strong> {{ $member->getAttribute('fillier') }}</li>
            <li><strong>Prise de mesure pour les vêtements:</strong> {{ $member->getAttribute('Prise de mesure pour les vêtements') }}</li>
            <li><strong>L'appartenance politique:</strong> {{ $member->getAttribute('L\'appartenance politique') }}</li>
            <li><strong>date d'adhésion à parti:</strong> {{ $member->getAttribute('date d\'adhésion à parti') }}</li>
            <li><strong>Membre actif dans le parti:</strong> {{ $member->getAttribute('Membre actif dans le parti') }}</li>
            <li><strong>La fonction au sein du parti:</strong> {{ $member->getAttribute('La fonction au sein du parti') }}</li>
        </ul>
        <a href="{{ route('members.list') }}">Back to Members List</a>
    </div>
@endsection

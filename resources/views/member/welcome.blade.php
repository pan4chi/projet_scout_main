@extends('layouts.member')
<table>
    <thead>
    <tr>
        <th>Nom complet en arabe</th>
        <th>Sexe</th>
        <th>État civil</th>
        <th>Nombre d'enfants</th>
        <th>Date de naissance</th>
        <th>Lieu de naissance</th>
        <th>L'adresse</th>
        <th>La ville</th>
        <th>CIN</th>
        <th>Numéro de téléphone</th>
        <th>Numéro WhatsApp</th>
        <th>Facebook</th>
        <th>Email</th>
        <th>Password</th>
        <th>niveau d'étude</th>
        <th>Spécialisation</th>
        <th>Niveau de langue arabe</th>
        <th>Niveau de langue amazighe</th>
        <th>Niveau de langue française</th>
        <th>niveau de langue anglais</th>
        <th>Niveau de langue espagnole</th>
        <th>Autres langues</th>
        <th>Situation professionnelle</th>
        <th>Spécialité professionnelle</th>
        <th>Années d'expérience</th>
        <th>Region</th>
        <th>date d'adhésion à l'association</th>
        <th>membre actif Dans l'association</th>
        <th>Responsabilité au sein de l'association</th>
        <th>Formation acquise</th>
        <th>fillier</th>
        <th>Prise de mesure pour les vêtements</th>
        <th>L'appartenance politique</th>
        <th>date d'adhésion à parti</th>
        <th>Membre actif dans le parti</th>
        <th>La fonction au sein du parti</th>
      </tr>
    </thead>
    <tbody>
      @foreach($members as $member)
      <tr>
        <td>{{ $member->getAttribute('Nom complet en arabe') }}</td>
        <td>{{ $member->getAttribute('Sexe') }}</td>
        <td>{{ $member->getAttribute('État civil') }}</td>
        <td>{{ $member->getAttribute('Nombre d\'enfants') }}</td>
        <td>{{ $member->getAttribute('Date de naissance') }}</td>
        <td>{{ $member->getAttribute('Lieu de naissance') }}</td>
        <td>{{ $member->getAttribute('L\'adresse') }}</td>
        <td>{{ $member->getAttribute('La ville') }}</td>
        <td>{{ $member->getAttribute('CIN') }}</td>
        <td>{{ $member->getAttribute('Numéro de téléphone') }}</td>
        <td>{{ $member->getAttribute('Numéro WhatsApp') }}</td>
        <td>{{ $member->getAttribute('Facebook') }}</td>
        <td>{{ $member->getAttribute('Email') }}</td>
        <td>{{ $member->getAttribute('Password') }}</td>
        <td>{{ $member->getAttribute('niveau d\'étude') }}</td>
        <td>{{ $member->getAttribute('Spécialisation') }}</td>
        <td>{{ $member->getAttribute('Niveau de langue arabe') }}</td>
        <td>{{ $member->getAttribute('Niveau de langue amazighe') }}</td>
        <td>{{ $member->getAttribute('Niveau de langue française') }}</td>
        <td>{{ $member->getAttribute('niveau de langue anglais') }}</td>
        <td>{{ $member->getAttribute('Niveau de langue espagnole') }}</td>
        <td>{{ $member->getAttribute('Autres langues') }}</td>
        <td>{{ $member->getAttribute('Situation professionnelle') }}</td>
        <td>{{ $member->getAttribute('Spécialité professionnelle') }}</td>
        <td>{{ $member->getAttribute('Années d\'expérience') }}</td>
        <td>{{ $member->getAttribute('Region') }}</td>
        <td>{{ $member->getAttribute('date d\'adhésion à l\'association') }}</td>
        <td>{{ $member->getAttribute('membre actif Dans l\'association') }}</td>
        <td>{{ $member->getAttribute('Responsabilité au sein de l\'association') }}</td>
        <td>{{ $member->getAttribute('Formation acquise') }}</td>
        <td>{{ $member->getAttribute('fillier') }}</td>
        <td>{{ $member->getAttribute('Prise de mesure pour les vêtements') }}</td>
        <td>{{ $member->getAttribute('L\'appartenance politique') }}</td>
        <td>{{ $member->getAttribute('date d\'adhésion à parti') }}</td>
        <td>{{ $member->getAttribute('Membre actif dans le parti') }}</td>
        <td>{{ $member->getAttribute('La fonction au sein du parti') }}</td>

          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{{$members->links()}}

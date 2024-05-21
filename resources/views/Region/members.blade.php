
@extends('Region.indexfiliere')

@section('content')

    <a  href="{{ route('region.addmember') }}"> Ajouter un Membre </a> 
    <h1>Liste des membres</h1>

    <table>
    <thead>
                <tr>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Niveau d'éducation</th>
                    <th scope="col">Niveau de Langue Arabe </th>
                    <th scope="col">Niveau de Langue Française </th>
                    <th scope="col">Niveau de Langue Anglaise </th>
                    <th scope="col">Niveau de Langue Amazighe </th>
                    <th scope="col">Niveau de Langue Espagnole </th>
                    <th scope="col">Profession</th>
                    <th scope="col">Responsablilité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher les membres -->
                @foreach($members as $member)
                <tr>
                    <td>{{ $member->Nom_complet_en_arabe }}</td>
                    <td>{{ $member->Sexe }}</td>
                    <td>{{ $member->Date_de_naissance }}</td>
                    <td>{{ $member->niveau_d_étude }}</td>
                    <td>{{ $member->Niveau_de_langue_arabe }}</td>
                    <td>{{ $member->Niveau_de_langue_française }}</td>
                    <td>{{ $member->NLA }}</td>
                    <td>{{ $member->Niveau_de_langue_amazighe }}</td>
                    <td>{{ $member->Niveau_de_langue_espagnole }}</td>
                    <td>{{ $member->Spécialité_professionnelle }}</td>
                    <td>{{ $member->Responsabilité_au_sein_de_l_association }}</td>
                <td>
                <a href="{{ route('member.show', $member) }}">Afficher</a>
                    <a href="{{ route('member.editForm', $member) }}">Modifier</a>
                    <form action="{{ route('member.delete' , $member) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

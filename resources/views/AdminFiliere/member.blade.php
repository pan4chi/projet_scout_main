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
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
  }

  /* Bouton d'ajout de membre */
  #add-member-btn {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 20px;
  }

  /* Tableau des membres */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #dee2e6;
  }

  th {
    background-color: #007bff;
    color: white;
  }

  /* Boutons d'action */
  .action-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .action-buttons button {
    margin: 0 5px;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  /* Bouton Afficher */
  #show-btn {
    background-color: #17a2b8;
    color: white;
  }

  /* Bouton Modifier */
  #edit-btn {
    background-color: #ffc107;
    color: black;
  }

  /* Bouton Supprimer */
  #delete-btn {
    background-color: #dc3545;
    color: white;
  }

</style>

<div class="container">
  <h1>Liste des membres</h1>

  <!-- Bouton d'ajout de membre -->
  <a href="{{ route('filiere.member.addform') }}" id="add-member-btn">Ajouter un membre</a>

  <!-- Tableau des membres -->
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
        <td class="action-buttons">
          <button id="show-btn"><a href="{{ route('filiere.member.show', $member) }}">Afficher</a></button>
          <button id="edit-btn"><a href="{{ route('filiere.member.editform', $member) }}">Modifier</a></button>
          <form action="{{ route('filiere.member.delete', $member) }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="delete-btn" type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


@extends('Region.adminregion')
@section('content')


    <div class="container">
        <h1>Liste des filières</h1>

        @if(isset($filieres) && count($filieres) > 0)
            <table class="table">
                <!-- Entête du tableau -->
                <thead>
                    <tr>
                        <th>Nom de la filière</th>
                        <th>Membres</th>
                    </tr>
                </thead>
                <!-- Corps du tableau -->
                <tbody>
                @foreach($filieres as $filiere)
                        <tr>
                            <td>{{ $filiere->Nom }}</td>
                            <!-- Affichez les membres de chaque filière selon vos besoins -->
                            <td>{{ $filiere->members->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
                        <!-- Code pour afficher les filières -->
                    @else
                        <p>Aucune filière trouvée.</p>
     
                   
            </table>
        @endif
    </div>
@endsection

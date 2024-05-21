

@extends('Region.adminregion')

@section('content')
    <h1>Ajouter une filière</h1>

    <form action="{{ route('region.addfiliere') }}" method="POST">
        @csrf
        <label for="Code">Code :</label>
        <input type="text" name="Code" value="{{ old('Code') }}">

        <label for="Nom">Nom :</label>
        <input type="text" name="Nom" value="{{ old('Nom') }}">

        <label for="region_id">Region_id :</label>
        <input type="number" name="region_id" value="{{ old('region_id') }}">

        <!-- Sélection de la région -->
        <!-- Vous pouvez ajouter un champ de sélection de région ici -->

        <button type="submit">Ajouter la filière</button>
    </form>
@endsection

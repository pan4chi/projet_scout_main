@extends('layouts.superAdmin')

@section('content')
    <style>
        /* Styles pour la mise en page */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Ajouter une filière</h1>

        <form action="{{ route('filiere.store') }}" method="POST">
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
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\Region;
use App\Models\Members;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function create(Request $request)
    {
        // Récupérer l'ID de la région à partir de la requête
        $region_id = $request->input('region_id');
        $region = Region::findOrFail($region_id);
        $filieres = Filiere::where('region_id', $region->id)->get();
        return view('admins.filiere.create', compact('region' , 'filieres'));
    }



    public function createFiliere()
    {
        return view('admins.filiere.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'Code' => 'required|string|max:255',
            'Nom' => 'required|string|max:255',
            'region_id'=> 'required|numeric|max:12'
            // Ajoutez vos règles de validation ici
        ]);

        // Créer une nouvelle filière
        $filiere = new filiere(); 
        $filiere->region_id = $validatedData['region_id'];
        $filiere->code = $validatedData['Code'];
        $filiere->nom = $validatedData['Nom'];
        // Ajoutez d'autres attributs si nécessaire
        $filiere->save();

        // Redirection avec un message de succès
        return redirect()->route('Region.index', $request->region_id)->with('success', 'Filière ajoutée avec succès.');
    }

    public function members($filiereId)
    {
        // Logique pour récupérer les membres de la filière avec l'ID $filiereId
        $filiere = filiere::findOrFail($filiereId);
        $membres = $filiere->Members; 

        // Passer les membres à la vue et retourner la vue
        return view('member.index', compact('membres' , 'filiere'));
    }
}


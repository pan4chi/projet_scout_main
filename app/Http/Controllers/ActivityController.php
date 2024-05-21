<?php

namespace App\Http\Controllers;

use App\Models\activities;
use App\Models\Members;
use App\Models\Region;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();  
            
        $activities = activities::all();
        return view('admins.activite.index', compact('activities' , 'user'));
            
        }
    }

    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();  
            
        $regions= Region::all() ;
        $filieres= filiere::all() ;
        $members= Members::all() ; 
        return view('admins.activite.create' , compact('members' , 'regions' , 'filieres' , 'user'));
            
        }
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            
                'La_branche' => 'required|string|max:255',
                'Entité' => 'required|string|max:255',
                'Le_siège_central' => 'required|string|max:255',
                'type_d_activité' => 'required|in:Culturel,Éducatif,Scout',
                'date_d_activity' => 'required|date',
                'Nature_de_l_activité' => 'required|string|max:255',
                'Domaine_de_l_activité' => 'required|string|max:255',
                'Nombre_de_bénéficiaires_masculins' => 'required|integer|min:0',
                'Nombre_de_bénéficiaires_féminins' => 'required|integer|min:0',
                'La_population_cible' => 'required|string|max:255',
                'Lieu_de_l_activité' => 'required|string|max:255',
                'Durée_de_l_activité' => 'required|string|max:255',
                'Rapport_d_activité' => 'nullable|string|max:255',
                'Les_membres_du_personnel_impliqués_dans_l_activité' => 'nullable|string|max:255',
                'Les_frais_de_l_activité' => 'required|numeric|min:0',
                'Les_Revenus_de_l_activité' => 'required|numeric|min:0',
                'location' => 'required|string|max:255',
                'fillier' => 'required|numeric|min:1' , 
                'member_id' => 'required|numeric|min:1' ,
                
           
        ]);

        // Créer une nouvelle activité
        activities::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('activities.index')->with('success', 'Activité ajoutée avec succès.');
    }

    public function edit(activities $activity)
    {
        if (Auth::check()) {
            $user = Auth::user();  
          $regions= Region::all() ;
        $filieres= filiere::all() ;
        $members= Members::all() ; 
        $activities = activities::all();
        return view('admins.activite.index', compact('activity' , 'members' , 'regions' , 'filieres' , 'activities' , 'user'));
 }
    }

    public function update(Request $request, activities $activity)
    {
        // Validation des données
        $validatedData = $request->validate([
            // Vos règles de validation ici
        ]);

        // Mettre à jour l'activité
        $activity->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('activities.edit', $activity)->with('success', 'Activité mise à jour avec succès.');
    }

    public function show(activities $activity)
{ 
    if (Auth::check()) {
        $user = Auth::user();  
    return view('admins.activite.show', compact('activity' . 'user'));

   
        
    }
}

public function destroy(activities $activity)
{
    // Supprimez l'activité de la base de données
    $activity->delete();

    // Redirigez l'utilisateur avec un message de confirmation
    return redirect()->route('activities.index')->with('success', 'Activité supprimée avec succès.');
}
}

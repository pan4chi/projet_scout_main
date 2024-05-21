<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Region;
use App\Models\filiere ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembreController extends Controller
{
    public function create()
    {

        if (Auth::check()) {
            $user = Auth::user();            
            $userName = Auth::user()->nom;
            $regions = Region::all();

            $filieres = filiere ::all();

        return view('admins.super_admin.create', compact('regions' , 'filieres' , 'user' , 'userName'));
        }
          
           
       
    }


    public function store(Request $request)
    {

       
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'Nom_complet_en_arabe' => 'required|string|max:255',
            'Sexe' => 'required|in:Male,Female',
            'État_civil' => 'nullable|string|max:255',
            'Nombre_d_enfants' => 'nullable|integer',
            'Date_de_naissance' => 'nullable|date',
            'Lieu_de_naissance' => 'nullable|string|max:255',
            'L_adresse' => 'nullable|string|max:255',
            'La_ville' => 'nullable|string|max:255',
            'CIN' => 'nullable|string|max:255',
            'Numéro_de_téléphone' => 'nullable|string|max:255',
            'Numéro_WhatsApp' => 'nullable|string|max:255',
            'Facebook' => 'nullable|string|max:255',
            'Email' => 'required|email|unique:membres|max:255',
            'Password' => 'required|string|min:8|max:255',
            'niveau_d_étude' => 'nullable|string|max:255',
            'Spécialisation' => 'nullable|string|max:255',
            'Niveau_de_langue_arabe' => 'nullable|integer',
            'Niveau_de_langue_amazighe' => 'nullable|integer',
            'Niveau_de_langue_française' => 'nullable|integer',
            'NLA' => 'nullable|integer',
            'Niveau_de_langue_espagnole' => 'nullable|integer',
            'Autres_langues' => 'nullable|string|max:255',
            'Situation_professionnelle' => 'nullable|string|max:255',
            'Spécialité_professionnelle' => 'nullable|string|max:255',
            'Années_d_expérience' => 'nullable|integer',
            'Region' => 'nullable|string|max:255',
            'date_d_adhésion_à_l_association' => 'nullable|date',
            'membre_actif_Dans_l_association' => 'required|in:Yes,No',
            'Responsabilité_au_sein_de_l_association' => 'nullable|string|max:255',
            'Formation_acquise' => 'nullable|string|max:255',
            'fillier' => 'nullable|string|max:255',
            'Prise_de_mesure_pour_les_vêtements' => 'nullable|string|max:255',
            'L_appartenance_politique' => 'nullable|string|max:255',
            'date_d_adhésion_à_parti' => 'nullable|date',
            'Membre_actif_dans_le_parti' => 'required|in:Yes,No',
            'La_fonction_au_sein_du_parti' => 'nullable|string|max:255',
            'association_id' => 'nullable|exists:scout_associations,id', // Vérifie si l'ID de l'association existe dans la table scout_associations
        ]);
        

        // Création d'un nouveau membre avec les données validées
        $membre = Members::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('admins.super_admin.member')->with('success', 'Le membre a été créé avec succès.');
    }

    public function edit(Members $member)
    {
        if (Auth::check()) {
            $user = Auth::user();  
            $userName = Auth::user()->nom;
            
        return view('admins.super_admin.edit', compact('member' , 'user' , 'userName'));

        }
        
    }

    public function update(Request $request, Members $membre)
    {
        // Validation des données
        $validatedData = $request->validate([
            'Nom_complet_en_arabe' => 'required|string|max:255',
            'Sexe' => 'required|in:Male,Female',
            'État_civil' => 'nullable|string|max:255',
            'Nombre_d_enfants' => 'nullable|integer',
            'Date_de_naissance' => 'nullable|date',
            'Lieu_de_naissance' => 'nullable|string|max:255',
            'L_adresse' => 'nullable|string|max:255',
            'La_ville' => 'nullable|string|max:255',
            'CIN' => 'nullable|string|max:255',
            'Numéro_de_téléphone' => 'nullable|string|max:255',
            'Numéro_WhatsApp' => 'nullable|string|max:255',
            'Facebook' => 'nullable|string|max:255',
            'Email' => 'required|email|unique:membres|max:255',
            'Password' => 'required|string|min:8|max:255',
            'niveau_d_étude' => 'nullable|string|max:255',
            'Spécialisation' => 'nullable|string|max:255',
            'Niveau_de_langue_arabe' => 'nullable|integer',
            'Niveau_de_langue_amazighe' => 'nullable|integer',
            'Niveau_de_langue_française' => 'nullable|integer',
            'NLA' => 'nullable|integer',
            'Niveau_de_langue_espagnole' => 'nullable|integer',
            'Autres_langues' => 'nullable|string|max:255',
            'Situation_professionnelle' => 'nullable|string|max:255',
            'Spécialité_professionnelle' => 'nullable|string|max:255',
            'Années_d_expérience' => 'nullable|integer',
            'Region' => 'nullable|string|max:255',
            'date_d_adhésion_à_l_association' => 'nullable|date',
            'membre_actif_Dans_l_association' => 'required|in:Yes,No',
            'Responsabilité_au_sein_de_l_association' => 'nullable|string|max:255',
            'Formation_acquise' => 'nullable|string|max:255',
            'fillier' => 'nullable|string|max:255',
            'Prise_de_mesure_pour_les_vêtements' => 'nullable|string|max:255',
            'L_appartenance_politique' => 'nullable|string|max:255',
            'date_d_adhésion_à_parti' => 'nullable|date',
            'Membre_actif_dans_le_parti' => 'required|in:Yes,No',
            'La_fonction_au_sein_du_parti' => 'nullable|string|max:255',
        ]);

        // Mettre à jour le membre
        $membre->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('membre.edit', $membre)->with('success', 'Membre mis à jour avec succès.');
    }

    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();            
         $members = Members::all();
         $userName = Auth::user()->nom;
        return view('admins.super_admin.member', compact('members' , 'user' , 'userName'));
        }
    }

    public function show(Request $request ,$id)
    {

        if (Auth::check()) {
            $user = Auth::user(); 
            $userName = Auth::user()->nom; 
            
        $member = Members::where('id',$id)->first();
        return view('admins.super_admin.show', compact('member' ,'user' , 'userName'));
        }
    }
}


<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Filiere;
use App\Models\Members;
use Illuminate\Support\Facades\Auth;

class AdminRegionController extends Controller
{
    
    public function index()
{
    if (Auth::check()) {
        $userId = Auth::id(); 
        $userName = Auth::user()->nom;
        $region = Region::find($userId);

        if ($region) {
            $filieres = $region->filiere()->with('members')->get();
            $userName = Auth::user()->nom;
            return view('Region.indexfiliere', compact('filieres', 'userName'));
        } else {
            return view('404'); 
        }
    } else {
        return view('auth.login');
    }
}


    

    
    public function createMemberForm()
{
    if (Auth::check()) {
        $user = Auth::id();
        $userName = Auth::user()->nom;

        $region = Region::find($user); 
        if ($region) {
            $filieres = $region->filiere; 
            $userName = Auth::user()->nom;
            return view('Region.addmember', compact('region', 'filieres' , 'userName'));
        } else {
            return view('404'); 
        }
    } else {
        return redirect()->route('login'); 
    }
}


    public function createFiliereForm()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $userName = Auth::user()->nom;

        // Récupérer la région de l'utilisateur connecté
        $region = $user->region;

        return view('Region.addfiliere', compact('region' , 'userName'));
    }

    public function addFiliere(Request $request)
    {
        $userId = Auth::id();
        $region = Region::find($userId);

        if ($region) {
            $filiere = new Filiere();
            $filiere->Code = $request->input('Code');
            $filiere->Nom = $request->input('Nom');
            $filiere->region_id = $request->input('region_id');
            

            $region->filiere()->save($filiere);

            return redirect()->route('region.index')->with('success', 'Filière ajoutée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Impossible de trouver la région.');
        }
    }

   

    public function addMember(Request $request)
    {
        $request->validate([
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
            'Email' => 'required|email|unique:members|max:255',
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
            'Formation_acquise' => 'required|in:Yes,No',
            'filiere_id' => 'nullable|string|max:255',
            'Prise_de_mesure_pour_les_vêtements' => 'nullable|string|max:255',
            'L_appartenance_politique' => 'nullable|string|max:255',
            'date_d_adhésion_à_parti' => 'nullable|date',
            'Membre_actif_dans_le_parti' => 'required|in:Yes,No',
            'La_fonction_au_sein_du_parti' => 'nullable|string|max:255',
            'association_id' => 'nullable|exists:scout_associations,id',
        ]);
    
        $userId = Auth::id();
        $region = Region::find($userId);
    
        if ($region) {
            $member = new Members();
            $member->fill($request->all());
            
    
            $region->members()->save($member);
    
            return redirect()->route('region.members')->with('success', 'Membre ajouté avec succès.');
        } else {
            return redirect()->route('region.members')->with('error', 'Impossible de trouver la région.');
        }
    }
    
    public function showStatistics()
{
    // Vérifier si l'utilisateur est connecté
    if (Auth::check()) {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();
        // Récupérer la région de l'utilisateur connecté
        $userName = Auth::user()->nom;
        $region = Region::find($userId);

        // Vérifier si la région existe
        if ($region) {
            // Récupérer les filières de la région
            $filieres = $region->filiere;
            $members = $region->Members;
            // Compter le nombre total de filières
            $totalFiliares = $filieres->count();
            $totalMembers = $members->count();
           
            // Initialiser un tableau pour stocker le nombre de membres par mois de naissance
            $membersByMonth = [];

          

                // Boucler à travers les membres pour les trier par mois de naissance
                foreach ($members as $member) {
                    // Récupérer le mois de naissance du membre
                    $birthMonth = Carbon::parse($member->Date_de_naissance)->format('F');
                    // Ajouter le membre au tableau associatif, en incrémentant le nombre de membres nés ce mois-ci
                    if (!isset($membersByMonth[$birthMonth])) {
                        $membersByMonth[$birthMonth] = 1;
                    } else {
                        $membersByMonth[$birthMonth]++;
                    }
                }
            

            // Trier le tableau par mois (en ordre alphabétique)
            ksort($membersByMonth);

            // Renvoyer la vue avec les données
            return view('Region.statistics', compact('totalFiliares', 'membersByMonth' , 'totalMembers' , 'userName'));
        } else {
            // Renvoyer une vue avec un message d'erreur si la région n'est pas trouvée
            return view('404');
        }
    } else {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->route('login');
    }
}


    // Assurez-vous d'importer le modèle Member si ce n'est pas déjà fait

public function editMember(Request $request, $id)
{
    $request->validate([
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
        'Email' => 'required|email|max:255|unique:members,email,'.$id,
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
        'filiere_id' => 'nullable|string|max:255',
        'Prise_de_mesure_pour_les_vêtements' => 'nullable|string|max:255',
        'L_appartenance_politique' => 'nullable|string|max:255',
        'date_d_adhésion_à_parti' => 'nullable|date',
        'Membre_actif_dans_le_parti' => 'required|in:Yes,No',
        'La_fonction_au_sein_du_parti' => 'nullable|string|max:255',
        'association_id' => 'nullable|exists:scout_associations,id',
    ]);

    $member = Members::find($id);

    if (!$member) {
        return redirect()->route('region.members')->with('error', 'Membre non trouvé.');
    }

    $member->update($request->all());

    return redirect()->route('region.members')->with('success', 'Informations du membre mises à jour avec succès.');
}

public function deleteMember($id)
{
    $members = Members::find($id);

    if (!$members) {
        return redirect()->back()->with('error', 'Membre non trouvé.');
    }

    $members->delete();

    return redirect()->back()->with('success', 'Membre supprimé avec succès.');
}

public function showMember($id)
{
    $member = Members::find($id);
    $userName = Auth::user()->nom;

    if (!$member) {
        return redirect()->back()->with('error', 'Membre non trouvé.');
    }

    return view('Region.member_show', compact('member' , 'userName'));
}

public function showMembers()
{
    $userId = Auth::id();
    $region = Region::find($userId);
    $userName = Auth::user()->nom;

    if ($region) {
        $members = Members::where('region_id', $userId)->get();
        return view('Region.members', compact('members' , 'userName'));
    } else {
        return view('404');
    }
}

public function showEditMemberForm($id)
{
    $member = Members::find($id);

    if (!$member) {
        return redirect()->back()->with('error', 'Membre non trouvé.');
    }

    return view('Region.member_edit', compact('member'));
}

}


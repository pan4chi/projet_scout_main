<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Members;
use App\Models\Region;
use App\Models\Activities;
use Illuminate\Support\Facades\Auth;

class AdminFiliereController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $userId = Auth::id();
        $filiere = filiere::find($userId)-50;
        $userName = Auth::user()->nom;
        
        if ($filiere) {
            return view('AdminFiliere.index', compact('filiere' , 'userName'));
        } else {
            return view('404');
        }
    } else {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
    }

   
}


public function addMemberForm()
{
    if (Auth::check()) {
        $user = Auth::user();
        $filiereId = $user->id - 50; 
        $filieres = Filiere::find($filiereId);
        if (!$filieres) {
            return redirect()->back()->with('error', 'Aucune filière associée à votre compte.');
        }
        $region = $filieres->region;
        $filiere = $region->filieres;
        $userName = Auth::user()->nom;

        return view('AdminFiliere.addmember', compact('filieres', 'region' , 'userName'));
    }
}





    public function addMember(Request $request)
    {
        $request->validate([
            'Nom_complet_en_arabe' => 'required|string|max:255',
            'Sexe' => 'required|in:Male,Female',
            'État_civil' => 'nullable|in:Marié,Célibataire,Divorcé',
            'Nombre_d_enfants' => 'nullable|integer',
            'Date_de_naissance' => 'nullable|date|before_or_equal:today',
            'Lieu_de_naissance' => 'nullable|string|max:255',
            'L_adresse' => 'nullable|string|max:255',
            'La_ville' => 'nullable|string|max:255',
            'CIN' => 'nullable|string|max:255',
            'Numéro_de_téléphone' => 'nullable|string|max:255|regex:/^0[0-9]{9}$/',
            'Numéro_WhatsApp' => 'nullable|string|max:255',
            'Facebook' => 'nullable|string|max:255',
            'Email' => 'required|email|unique:members|max:255',
            'Password' => 'required|string|min:8|max:255',
            'niveau_d_étude' => 'nullable|in:Bac+2,Bac+5,Bac+3,Lycée,Collège',
            'Spécialisation' => 'nullable|string|max:255',
            'Niveau_de_langue_arabe' => 'nullable|integer',
            'Niveau_de_langue_amazighe' => 'nullable|integer',
            'Niveau_de_langue_française' => 'nullable|integer',
            'NLA' => 'nullable|integer',
            'Niveau_de_langue_espagnole' => 'nullable|integer',
            'Autres_langues' => 'nullable|string|max:255',
            'Situation_professionnelle' => 'nullable|in:Etudiant,Stagiaires,Salarié',
            'Spécialité_professionnelle' => 'nullable|string|max:255',
            'Années_d_expérience' => 'nullable|integer',
            'region_id' => 'nullable|string|max:255',
            'date_d_adhésion_à_l_association' => 'nullable|date|after_or_equal:date_de_naissance',
            'membre_actif_Dans_l_association' => 'required|in:Yes,No',
            'Responsabilité_au_sein_de_l_association' => 'nullable|string|max:255',
            'Formation_acquise' => 'required|in:Yes,No',
            'fillier' => 'nullable|string|max:255',
            'Prise_de_mesure_pour_les_vêtements' => 'nullable|string|max:255',
            'L_appartenance_politique' => 'nullable|string|max:255',
            'date_d_adhésion_à_parti' => 'nullable|date|after_or_equal:date_de_naissance',
            'Membre_actif_dans_le_parti' => 'required|in:Yes,No',
            'La_fonction_au_sein_du_parti' => 'nullable|string|max:255',
            'association_id' => 'nullable|exists:scout_associations,id',
        ]);
        

      
        $member = new Members();
        $member->fill($request->all());
        $user = Auth::user();
        $filiereId = $user->id - 50; 
        $member->fillier = $filiereId;
        
        
        $member->save();
        return redirect()->back()->with('success', 'Membre ajouté avec succès.');
    }

    

    public function editMemberForm($id)
    {
        $member = Members::findOrFail($id);
        $user = Auth::user();
        $userName = Auth::user()->nom;
        $filiereId = $user->id - 50; 
        if ($member->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de modifier ce membre.');
        }
        return view('AdminFiliere.editmember', compact('member' , 'userName'));
        
    }

    public function editMember(Request $request, $id)
    {
        $request->validate([
        ]);

        $member = Members::findOrFail($id);

        $user = Auth::user();
        $filiereId = $user->id - 50; 
        if ($member->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de modifier ce membre.');
        }

        $member->update($request->all());
        return redirect()->back()->with('success', 'Informations du membre mises à jour avec succès.');
    }

    public function showMember($id)
    {
        $member = Members::findOrFail($id);
        $userName = Auth::user()->nom;
        $user = Auth::user();
        $filiereId = $user->id - 50; 
        if ($Members->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission d\'afficher ce membre.');
        }

        return view('AdminFiliere.showmember', compact('Members' , 'userName'));
    }

    public function addActivityForm()
    {
       
        if (Auth::check()) {
            $user = Auth::user();
            $filiereId = $user->id - 50; 
            $members = Members::where('fillier', $filiereId)->get();
            $filiere = Filiere::find($filiereId);

            $region = $filiere->region;
           
            $userName = Auth::user()->nom;
            return view('AdminFiliere.addactivity', compact('members', 'filiere', 'region' , 'userName'));
        }
    }

    



    public function addActivity(Request $request)
    {
       
            $request->validate([
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
                'location' => 'required|string|min:1',
                'fillier' => 'required|numeric|min:1',
            ]);
        
            $activity = new Activities();
            $activity->fill($request->all());
            $activity->save();
            return redirect()->route('filiere.activity.list')->with('success', 'Activité ajoutée avec succès.');
        
        
    }

    public function listActivities()
    {
       
            $user = Auth::user();
            $filiereId = $user->id - 50; 
            $activities = Activities::where('fillier', $filiereId)->get();
            $userName = Auth::user()->nom;
            return view('AdminFiliere.activity', compact('activities' , 'userName'));
       

    }
    
    

    public function editActivityForm($id)
    {
        $activity = Activities::findOrFail($id);
        $user = Auth::user();
        $userName = Auth::user()->nom;
        $filiereId = $user->id - 50;
        if ($activity->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de modifier cette activité.');
        }

        return view('AdminFiliere.editactivity', compact('activity', 'userName'));
    }

    public function editActivity(Request $request, $id)
    {
        $request->validate([
            'La_branche' => 'required|string|max:255',
            'Entité' => 'required|string|max:255',
            'Le_siège_central' => 'required|string|max:255',
            'type_d_activité' => 'required|string|max:255',
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
            'fillier' => 'required|numeric|min:1',
        ]);
    
        $activity = Activities::findOrFail($id);
        $activity->update($request->all());
    
        return redirect()->back()->with('success', 'Activité modifiée avec succès.');
    }
    

    public function showActivity($id)
    {
        $activity = Activities::findOrFail($id);
        $user = Auth::user();
        $filiereId = $user->id -50; 
        $userName = Auth::user()->nom;
        if ($activity->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission d\'afficher cette activité.');
        }

        return view('AdminFiliere.showactivity', compact('activity' , 'userName'));
    }
    public function listMembers()
    {
        $user = Auth::user();
        $filiereId = $user->id - 50; 
        $members = Members::where('fillier', $filiereId)->get();
        $userName = Auth::user()->nom;
        return view('AdminFiliere.member', compact('members' , 'userName'));
    }




    public function deleteMember($id)
    {
        $member = Members::findOrFail($id);
        $user = Auth::user();
        $filiereId = $user->id - 50; 
        $userName = Auth::user()->nom;
        if ($member->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de supprimer ce membre.');
        }

        $member->delete();

        return redirect()->back()->with('success', 'Membre supprimé avec succès.');
    }

    public function deleteActivity($id)
    {
        $activity = activities::findOrFail($id);

        $user = Auth::user();
        $filiereId = $user->id - 50; 
        $userName = Auth::user()->nom;
        if ($activity->fillier != $filiereId) {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de supprimer cette activité.');
        }

        $activity->delete();

        return redirect()->back()->with('success', 'Activité supprimée avec succès.');
    }

   
// Controller
public function statistics()
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();
    $userName = Auth::user()->nom;

    // Récupérer l'ID de la filière à partir de l'utilisateur connecté
    $filiereId = $user->id - 50; // Ajouter +13 pour compenser le décalage

    // Récupérer les données pour les activités
    $activitiesData = activities::where('fillier', $filiereId)
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, COUNT(*) as count")
        ->groupBy('date')
        ->get();

    // Récupérer les données pour les membres
    $membersData = Members::where('fillier', $filiereId)
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, COUNT(*) as count")
        ->groupBy('date')
        ->get();

    // Retourner la vue des statistiques avec les données
    return view('AdminFiliere.statistics', compact('activitiesData', 'membersData'  , 'userName'));
}


}

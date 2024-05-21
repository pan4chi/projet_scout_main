<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SuperAdmin extends Controller
{

     public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();            
            return view('layouts.superAdmin', compact('user')); 
        }
    }

    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();            
            return view('admins.super_admin.create', compact('user')); 
        }
    }


    public function store(Request $request)
{

    if (Auth::check()) {
        $user = Auth::user();            
    
    try {
        $data = [
            'Nom_complet_en_arabe' => $request->input('Nom_complet_en_arabe'),
            'Sexe' => $request->input('Sexe'),
            'État_civil' => $request->input('État_civil'),
            'Nombre_d_enfants' => $request->input('Nombre_d_enfants'),
            'Date_de_naissance' => $request->input('Date_de_naissance'),
            'Lieu_de_naissance' => $request->input('Lieu_de_naissance'),
            'L_adresse' => $request->input('L_adresse'),
            'La_ville' => $request->input('La_ville'),
            'CIN' => $request->input('CIN'),
            'Numéro_de_téléphone' => $request->input('Numéro_de_téléphone'),
            'Numéro_WhatsApp' => $request->input('Numéro_WhatsApp'),
            'Facebook' => $request->input('Facebook'),
            'Email' => $request->input('Email'),
            'Password' => $request->input('Password'),
            'niveau_d_étude' => $request->input('niveau_d_étude'),
            'Spécialisation' => $request->input('Spécialisation'),
            'Niveau_de_langue_arabe' => $request->input('Niveau_de_langue_arabe'),
            'Niveau_de_langue_amazighe' => $request->input('Niveau_de_langue_amazighe'),
            'Niveau_de_langue_française' => $request->input('Niveau_de_langue_française'),
            'NLA' => $request->input('NLA'),
            'Niveau_de_langue_espagnole' => $request->input('Niveau_de_langue_espagnole'),
            'Autres_langues' => $request->input('Autres_langues'),
            'Situation_professionnelle' => $request->input('Situation_professionnelle'),
            'Spécialité_professionnelle' => $request->input('Spécialité_professionnelle'),
            'Années_d_expérience' => $request->input('Années_d_expérience'),
            'region_id' => $request->input('region_id'),
            'date_d_adhésion_à_l_association' => $request->input('date_d_adhésion_à_l_association'),
            'membre_actif_Dans_l_association' => $request->input('membre_actif_Dans_l_association'),
            'Responsabilité_au_sein_de_l_association' => $request->input('Responsabilité_au_sein_de_l_association'),
            'Formation_acquise' => $request->input('Formation_acquise'),
            'fillier' => $request->input('fillier'),
            'Prise_de_mesure_pour_les_vêtements' => $request->input('Prise_de_mesure_pour_les_vêtements'),
            'L_appartenance_politique' => $request->input('L_appartenance_politique'),
            'date_d_adhésion_à_parti' => $request->input('date_d_adhésion_à_parti'),
            'Membre_actif_dans_le_parti' => $request->input('Membre_actif_dans_le_parti'),
            'La_fonction_au_sein_du_parti' => $request->input('La_fonction_au_sein_du_parti')
        ];


        

        DB::table('Members')->insert($data);

        return redirect()->route('members_super.list' , compact ('user'))->with('success', 'Member created successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the member: ' . $e->getMessage()]);
    }
    }
}





    public function show(Request $request ,$id)
    {
        $member = Members::where('id',$id)->first();
        return view('admins.super_admin.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Members::findOrFail($id);
        return view('admins.super_admin.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {

          DB::table('Members')->where('id' , $id)->update([
            'Nom_complet_en_arabe' => $request->input('Nom_complet_en_arabe'),
            'Sexe' => $request->input('Sexe'),
            'État_civil' => $request->input('État_civil'),
            'Nombre_d_enfants' => $request->input('Nombre_d_enfants'),
            'Date_de_naissance' => $request->input('Date_de_naissance'),
            'Lieu_de_naissance' => $request->input('Lieu_de_naissance'),
            'L_adresse' => $request->input('L_adresse'),
            'La_ville' => $request->input('La_ville'),
            'CIN' => $request->input('CIN'),
            'Numéro_de_téléphone' => $request->input('Numéro_de_téléphone'),
            'Numéro_WhatsApp' => $request->input('Numéro_WhatsApp'),
            'Facebook' => $request->input('Facebook'),
            'Email' => $request->input('Email'),
            'Password' => $request->input('Password'),
            'niveau_d_étude' => $request->input('niveau_d_étude'),
            'Spécialisation' => $request->input('Spécialisation'),
            'Niveau_de_langue_arabe' => $request->input('Niveau_de_langue_arabe'),
            'Niveau_de_langue_amazighe' => $request->input('Niveau_de_langue_amazighe'),
            'Niveau_de_langue_française' => $request->input('Niveau_de_langue_française'),
            'NLA' => $request->input('NLA'),
            'Niveau_de_langue_espagnole' => $request->input('Niveau_de_langue_espagnole'),
            'Autres_langues' => $request->input('Autres_langues'),
            'Situation_professionnelle' => $request->input('Situation_professionnelle'),
            'Spécialité_professionnelle' => $request->input('Spécialité_professionnelle'),
            'Années_d_expérience' => $request->input('Années_d_expérience'),
            'region_id' => $request->input('region_id'), 
            'date_d_adhésion_à_l_association' => $request->input('date_d_adhésion_à_l_association'),
            'membre_actif_Dans_l_association' => $request->input('membre_actif_Dans_l_association'),
            'Responsabilité_au_sein_de_l_association' => $request->input('Responsabilité_au_sein_de_l_association'),
            'Formation_acquise' => $request->input('Formation_acquise'),
            'fillier' => $request->input('fillier'),
            'Prise_de_mesure_pour_les_vêtements' => $request->input('Prise_de_mesure_pour_les_vêtements'),
            'L_appartenance_politique' => $request->input('L_appartenance_politique'),
            'date_d_adhésion_à_parti' => $request->input('date_d_adhésion_à_parti'),
            'Membre_actif_dans_le_parti' => $request->input('Membre_actif_dans_le_parti'),
            'La_fonction_au_sein_du_parti' => $request->input('La_fonction_au_sein_du_parti') ,
        ]);
        // return $request;
        return redirect()->route('members_super.list')->with('success', 'Member updated successfully.');
    }
    public function destroy($id)
    {
        Members::where('id',$id)->delete();

        return redirect()->route('members_super.list')->with('success', 'Member deleted successfully.');
    }
    public function destroyAll()
    {
        DB::table('Members')->delete();

        return redirect()->route('members_super.list')->with('success', 'Member deleted successfully.');
    }
}



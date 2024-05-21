<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['Nom_complet_en_arabe', 'Sexe', 'État_civil', 'Nombre_d_enfants', 'Date_de_naissance', 'Lieu_de_naissance', 'L_adresse', 'La_ville', 'CIN', 'Numéro_de_téléphone', 'Numéro_WhatsApp', 'Facebook', 'Email', 'Password', 'niveau_d_étude', 'Spécialisation', 'Niveau_de_langue_arabe', 'Niveau_de_langue_amazighe', 'Niveau_de_langue_française', 'NLA', 'Niveau_de_langue_espagnole', 'Autres_langues', 'Situation_professionnelle', 'Spécialité_professionnelle', 'Années_d_expérience', 'Region', 'date_d_adhésion_à_l_association', 'membre_actif_Dans_l_association', 'Responsabilité_au_sein_de_l_association', 'Formation_acquise', 'fillier' , 'Prise_de_mesure_pour_les_vêtements', 'L_appartenance_politique', 'date_d_adhésion_à_parti', 'Membre_actif_dans_le_parti', 'La_fonction_au_sein_du_parti', 'association_id'];
    
    public function filiere()
    {
        return $this->belongsTo(filiere::class, 'fillier'); 
    }

    public function Activities()
    {
        return $this->hasMany(Members::class , 'member_id');
    }
}

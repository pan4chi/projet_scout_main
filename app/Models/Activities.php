<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    
   

    protected $fillable = [
        'La_branche',
        'Entité',
        'Le_siège_central',
        'type_d_activité',
        'date_d_activity',
        'Nature_de_l_activité',
        'Domaine_de_l_activité',
        'Nombre_de_bénéficiaires_masculins',
        'Nombre_de_bénéficiaires_féminins',
        'La_population_cible',
        'Lieu_de_l_activité',
        'Durée_de_l_activité',
        'Rapport_d_activité',
        'Les_membres_du_personnel_impliqués_dans_l_activité',
        'Les_frais_de_l_activité',
        'Les_Revenus_de_l_activité',
        'location', 
        'fillier'
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'fillier'); 
    }

    public function Members()
    {
        return $this->hasMany(Members::class, 'id');
    }
}


<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiliereAdmin extends Model
{
    protected $fillable = ['nom', 'prenom', 'region', 'filiere_id', 'email', 'password', 'association_id'];

    public function association()
    {
        return $this->belongsTo(ScoutAssociation::class);
    }
}

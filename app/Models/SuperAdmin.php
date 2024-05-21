<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'association_id'];

    public function association()
    {
        return $this->belongsTo(ScoutAssociation::class);
    }
}

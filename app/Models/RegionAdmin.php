<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionAdmin extends Model
{
    protected $fillable = ['nom', 'prenom', 'region', 'email', 'password', 'association_id'];

    public function association()
    {
        return $this->belongsTo(ScoutAssociation::class);
    }
}

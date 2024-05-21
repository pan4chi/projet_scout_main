<?php

// Region.php (Modèle)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['nom'];

    public function filiere()
    {
        return $this->hasMany(Filiere::class);
    }

    public function members()
    {
        return $this->hasMany(Members::class);
    }
}


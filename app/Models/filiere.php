<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class filiere extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'nom', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function Members()
    {
        return $this->hasMany(Members::class , 'fillier');
    }

    public function Activities()
    {
        return $this->hasMany(Activities::class , 'fillier');
    }
}





<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoutAssociation extends Model
{
    protected $fillable = ['name', 'region'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class);
    }

    public function centralAdmins()
    {
        return $this->hasMany(CentralAdmin::class);
    }

    public function regionAdmins()
    {
        return $this->hasMany(RegionAdmin::class);
    }

    public function filiereAdmins()
    {
        return $this->hasMany(FiliereAdmin::class);
    }
}

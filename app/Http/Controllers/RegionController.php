<?php
namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Members;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $userName = Auth::user()->nom;
        
        return view('admins.Region.index', compact('regions' , 'userName'));
       
    }
    
    public function show($region_id)
    {
        $region = Region::findOrFail($region_id);
        $userName = Auth::user()->nom;
        $filieres = $region->filiere; // Récupérer les filières de la région

       
        return view('admins.Region.show', compact('region', 'filieres' , 'userName' ));
    }
   
}



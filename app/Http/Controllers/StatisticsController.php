<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Activities;
use App\Models\Region;
use App\Models\Filiere;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
{
    // Récupérer les noms des filières
    $filieres = Filiere::pluck('Nom', 'id');
    
    // Récupérer les données pour le premier graphe : nombre de membres par région et filière
    $membersByRegionAndFiliere = Members::select('region_id', 'fillier')
        ->selectRaw('COUNT(*) as total_members')
        ->groupBy('region_id', 'fillier')
        ->get();
    
    // Récupérer les données pour le deuxième graphe : nombre d'activités par filière
    $activitiesByFiliere = Activities::select('fillier')
        ->selectRaw('COUNT(*) as total_activities')
        ->groupBy('fillier')
        ->get();

    // Calcul du pourcentage d'augmentation des activités
    $currentWeekStart = Carbon::now()->startOfWeek();
    $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
    $currentWeekActivities = Activities::where('created_at', '>=', $currentWeekStart)->count();
    $lastWeekActivities = Activities::whereBetween('created_at', [$lastWeekStart, $currentWeekStart])->count();

    if ($lastWeekActivities > 0) {
        $percentageIncrease = (($currentWeekActivities - $lastWeekActivities) / $lastWeekActivities) * 100;
    } else {
        $percentageIncrease = 0;
    }
    
    // Passer les données à la vue
    return view('admins.statistics.index', [
        'filieres' => $filieres,
        'membersByRegionAndFiliere' => $membersByRegionAndFiliere,
        'activitiesByFiliere' => $activitiesByFiliere,
        'percentageIncrease' => $percentageIncrease,
    ]);
}

}

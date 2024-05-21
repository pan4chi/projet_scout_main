@extends('layouts.superAdmin')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Statistiques</h1>

    <!-- Afficher le pourcentage d'augmentation des activités -->
    <h2>Pourcentage d'augmentation des activités cette semaine : {{ number_format($percentageIncrease, 2) }}%</h2>

    <!-- Graphe 1 : Nombre de membres par région et filière -->
    <center> <h2> Nombre de Membre par Filière </h2> </center>
    <canvas id="membersByRegionAndFiliere"></canvas>

    <!-- Graphe 2 : Nombre d'activités par filière -->
   <center>  <h2> Nombre d'Activité par Filière </h2> </center> 
    <canvas id="activitiesByFiliere"></canvas>

    <script>
        // Données pour le premier graphe
        var membersByRegionAndFiliereData = {!! json_encode($membersByRegionAndFiliere) !!};
        // Données pour le deuxième graphe
        var activitiesByFiliereData = {!! json_encode($activitiesByFiliere) !!};

        // Noms des filières
        var filiereNames = {!! json_encode($filieres->values()) !!};

        // Préparer les données pour le premier graphe
        var regions = [];
        var regionData = {};
        
        membersByRegionAndFiliereData.forEach(function(item) {
            if (!regions.includes(item.region_id)) {
                regions.push(item.region_id);
            }
            if (!regionData[item.region_id]) {
                regionData[item.region_id] = [];
            }
            regionData[item.region_id].push(item.total_members);
        });

        var membersDatasets = regions.map(function(region, index) {
            return {
                label: 'Région ' + region,
                data: regionData[region],
                backgroundColor: getRandomColor()
            };
        });

        // Générer des couleurs aléatoires pour chaque filière
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var colors = filiereNames.map(() => getRandomColor());

        // Configurer les options des graphiques (axes, titres, etc.)
        var options = {
            // Ajoutez vos options de configuration ici
        };

        // Créer le premier graphe
        var membersByRegionAndFiliereChart = new Chart(document.getElementById('membersByRegionAndFiliere'), {
            type: 'bar', 
            data: {
                labels: filiereNames,
                datasets: membersDatasets
            },
            options: options
        });

        // Créer le deuxième graphe
        var activitiesByFiliereChart = new Chart(document.getElementById('activitiesByFiliere'), {
            type: 'line', 
            data: {
                labels: filiereNames, 
                datasets: [{
                    label: 'Nombre d\'activités par filière',
                    data: activitiesByFiliereData.map(data => data.total_activities),
                    backgroundColor: colors,
                    borderColor: colors,
                    fill: false
                }]
            },
            options: options
        });
    </script>
</body>
</html>

@endsection

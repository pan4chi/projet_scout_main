@extends('Region.adminregion')

@section('content')
    <div class="container">
        <h1>Statistiques</h1>

        <h2>Nombre total de filières : {{ $totalFiliares }}</h2>
        <h2>Nombre total de Membres : {{ $totalMembers }}</h2>

        <!-- Graphique en ligne pour le nombre de membres par mois de naissance -->
        <canvas id="membersByMonthChart" width="50" height="20"></canvas>

        <!-- Sélection du mois pour trier les membres -->
        <label for="sortMonth">Trier par mois de naissance :</label>
        <select id="sortMonth">
            <option value="">Tous les mois</option>
            @foreach($membersByMonth as $month => $count)
                <option value="{{ $month }}">{{ $month }}</option>
            @endforeach
        </select>
    </div>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script>
        // Récupérer les données pour le graphique
        var membersByMonthData = @json($membersByMonth);

        // Créer les labels et les données pour le graphique en ligne
        var labels = Object.keys(membersByMonthData);
        var data = Object.values(membersByMonthData);

        // Créer le graphique en ligne
        var ctx = document.getElementById('membersByMonthChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de membres',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de membres'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mois de naissance'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });

        // Ajouter un écouteur d'événements pour le changement de sélection
        document.getElementById('sortMonth').addEventListener('change', function() {
            var selectedMonth = this.value;
            // Mettre à jour les données du graphique en fonction du mois sélectionné
            if (selectedMonth !== '') {
                chart.data.labels = [selectedMonth];
                chart.data.datasets[0].data = [membersByMonthData[selectedMonth]];
            } else {
                chart.data.labels = labels;
                chart.data.datasets[0].data = data;
            }
            chart.update();
        });
    </script>
@endsection

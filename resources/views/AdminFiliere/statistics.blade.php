<!-- Vue : AdminFiliere.statistics.blade.php -->
@extends('AdminFiliere.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statistiques de la filière</div>

                <div class="card-body">
                    <canvas id="activitiesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statistiques des membres de la filière</div>

                <div class="card-body">
                    <canvas id="membersChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var activitiesCtx = document.getElementById('activitiesChart').getContext('2d');
    var activitiesChart = new Chart(activitiesCtx, {
        type: 'line',
        data: {
            labels: {!! $activitiesData->pluck('date')->toJson() !!},
            datasets: [{
                label: 'Nombre d\'activités',
                data: {!! $activitiesData->pluck('count')->toJson() !!},
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var membersCtx = document.getElementById('membersChart').getContext('2d');
    var membersChart = new Chart(membersCtx, {
        type: 'line',
        data: {
            labels: {!! $membersData->pluck('date')->toJson() !!},
            datasets: [{
                label: 'Nombre de membres',
                data: {!! $membersData->pluck('count')->toJson() !!},
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection

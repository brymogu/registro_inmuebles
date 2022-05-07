@extends('layouts.administrador')


@section('content')
    <div class="row " id="home">
        <div class="col-4 m-3">
            <div class="card border-0 shadow-sm">
                <canvas id="tipo_negocio" style="height: 40vh;"></canvas>
            </div>
        </div>
        <div class="col-4 m-3">
            <div class="card border-0 shadow-sm">
                <canvas id="tipo_inmb" style="height: 40vh;"></canvas>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-12">
            
        </div>
    </div>
@endsection

@section('final')
    <!-- Charting library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const negocios = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [{{ $arriendo }}, {{ $venta }}],
                    backgroundColor: ['#ff6384', '#36a2eb']
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Arriendo',
                    'Venta'
                ]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: 'Tipo de negocio'
                    }
                },
                layout: {
                    padding: 20
                }
            },
        };

        const inmb = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [{{ $apartamentos }}, {{ $casas }}],
                    backgroundColor: ['#ff6384', '#36a2eb']
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Apartamentos',
                    'Casas'
                ]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: 'Tipo de negocio'
                    }
                },
                layout: {
                    padding: 20
                }
            },
        };
    </script>
    <script>
        const negocio_chart = new Chart(
            document.getElementById('tipo_negocio'),
            negocios
        );
        const inmb_chart = new Chart(
            document.getElementById('tipo_inmb'),
            inmb
        );
    </script>
@endsection

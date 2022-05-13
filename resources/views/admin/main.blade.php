@extends('layouts.administrador')
@section('more_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endsection
@section('title', 'Bienvenido')

@section('content')
    <div class="row py-3" id="home">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold ">Inmuebles consignados</p>
                    <div class="card border-0 shadow-sm">
                        <canvas id="tipo_negocio" style="height: 41vh;"></canvas>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <canvas id="tipo_inmb" style="height: 41vh;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="tabla">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle" id="datos" data-page-length='6'>
                        <thead class="text-secondary">
                            <tr>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Datos Personales
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solodatos as $dato)
                                <tr>
                                    <td>
                                        <button class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="{{ date('d M Y', strtotime($dato->created_at)) }}">{{ \Carbon\Carbon::parse($dato->created_at)->diffForHumans() }}</button>
                                    </td>
                                    <td>
                                        <p class="fw-bold">{{ $dato->name }} {{ $dato->lastname }}</p>
                                        <p class="fw-lighter"> <span
                                                class="user-select-all">{{ $dato->full_number }}</span> -
                                            <span class="user-select-all">{{ $dato->email }}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
    <script>
        $(document).ready(function() {
            $('#datos').DataTable({
                language: {
                    search: "Buscar:",
                    paginate: {
                        first: "Primero",
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>',
                        last: "Ultimo"
                    },
                    lengthMenu: '<p class="fw-bold ">Registros incompletos</p>',
                    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                },
            });
        });
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection

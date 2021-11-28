@extends('layouts.administrador')
@section('more_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection
@section('title', 'Descargar')

@section('content')
    <div class="col-12 pt-5 px-3">
        <div class="tabla">
            <div class="table-responsive">
                <table class="table table-borderless align-middle" id="datos">
                    <thead class="text-secondary">
                        <tr>
                            <th>
                                Fecha de registro
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Documento
                            </th>
                            <th>
                                Plan
                            </th>
                            <th>
                                Certificado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($negocios as $negocio)
                            <tr>
                                <td>
                                    <button class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="{{ date('d M Y', strtotime($negocio->created_at)) }}">{{ \Carbon\Carbon::parse($negocio->created_at)->diffForHumans() }}</button>
                                </td>                                                                   
                                <td>
                                    <b> {{ $negocio->name }}</b><br />
                                    {{ $negocio->lastname }}
                                </td>
                                <td>
                                    <b> {{ $negocio->desc_nombres_corto }}</b><br />
                                    {{ $negocio->doc_number }}
                                </td>
                                <td>
                                    {{ $negocio->desc_plan }}
                                </td>
                                <td>
                                    <a class="btn btn-epc rounded-circle" target="_blank" href="{{$negocio->certificado}}"><i
                                        class="fas fa-file-pdf"></i></a>
                                        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('final')
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
                    lengthMenu: '<p class="fw-bold ">Inmuebles Consignados</p>',
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
@extends('layouts.administrador')
@section('more_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection
@section('title', 'Descargar')

@section('content')
    <div class="row my-3 excel">
        <div class="col-7">
        </div>
        <div class="col-5">
            {{ Form::open(['route' => 'administrador.excel']) }}
            <div class="card shadow-sm border-0 py-1">
                <div class="row mx-1">
                    <div class="col-5">
                        <div class="form-floating border-end">
                            <input type="date" name="f_inicio" class="form-control" id="f_inicio"
                                value="{{ date('Y') }}-01-01">
                            <label for="f_inicio">Inicio</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-floating border-end">
                            <input type="date" name="f_final" class="form-control" id="f_final"
                                value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                            <label for="f_final">Final</label>
                        </div>
                    </div>
                    <div class="col-2 py-2 d-flex align-self-center">
                        <button type="submit" class="btn btn-epc rounded-circle ">
                            <i class="fas fa-file-excel"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-12 px-3">
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
                                <th class="text-center">
                                    Cert.
                                </th>
                                <th class="text-center">
                                    Ficha
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
                                        <b> {{ $negocio->doc_number }}</b><br />
                                        {{ $negocio->desc_nombres_corto }}
                                    </td>
                                    <td>
                                        {{ $negocio->desc_plan }}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-epc rounded-circle" target="_blank"
                                            href="{{ Storage::url($negocio->certificado) }}" download><i
                                                class="fas fa-file-pdf"></i></a>
                                    </td>
                                    <td class="text-center">
                                        {{ Form::open(['method' => 'post']) }}
                                        <input type="text" class="d-none" name="codineg"
                                            value="{{ $negocio->id_neg }}">
                                        <button type="submit" class="btn btn-epc rounded-circle"><i
                                                class="fas fa-file-invoice"></i></button>

                                        {{ Form::close() }}
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
                    lengthMenu: '<p class="fw-bold ">Descarga de Documentos</p>',
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

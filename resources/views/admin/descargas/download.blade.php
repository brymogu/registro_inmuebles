@extends('layouts.administrador')
@section('more_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection
@section('title', 'Inmuebles consignados')

@section('content')
    <div class="row my-3 excel" id="descargas">
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
                            <i class="fas fa-download"></i>
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
                                    Fecha
                                </th>
                                <th>
                                    Datos Personales
                                </th>
                                <th class="text-center">
                                    Asesor
                                </th>

                                <th class="text-center">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($negocios as $negocio)
                                @if ($negocio->paso == 'Final')
                                    <tr>
                                        <td>
                                            <button class="btn" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="{{ date('d M Y', strtotime($negocio->created_at)) }}">{{ \Carbon\Carbon::parse($negocio->created_at)->diffForHumans() }}</button>
                                        </td>
                                        <td>
                                            <p class="fw-bold">{{ $negocio->name }} {{ $negocio->lastname }}</p>
                                            <p class="fw-lighter"> <span
                                                    class="user-select-all">{{ $negocio->full_number }}</span> -
                                                <span class="user-select-all">{{ $negocio->email }}</span>
                                            </p>
                                            <p class="fw-lighter"> {{ $negocio->desc_ciudades }}
                                            </p>
                                        </td>
                                        <td>
                                            <b> {{ $negocio->asesor }}</b>
                                        </td>

                                        <td class="text-end">
                                            <div class="row mx-0 mb-3">
                                                <div class="col-4"></div>
                                                <div class="col-2">
                                                    <a class="btn btn-epc rounded-circle" target="_blank"
                                                        href="{{ Storage::url($negocio->certificado) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Certificado"><i class="fas fa-file-pdf"></i></a>
                                                </div>
                                                <div class="col-2">
                                                    {{ Form::open(['method' => 'post', 'route' => 'administrador.editform']) }}
                                                    <input type="text" class="d-none" name="codineg"
                                                        value="{{ $negocio->id_neg }}">
                                                    <button type="submit" class="btn btn-epc rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                                    {{ Form::close() }}
                                                </div>
                                                <div class="col-4"></div>
                                            </div>
                                            <div class="row mx-0">
                                                <div class="col-4"></div>
                                                <div class="col-2">
                                                    <a href="{{ route('administrador.formatos', $negocio->id_neg) }}"
                                                        class="btn btn-epc rounded-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Ficha técnica">
                                                        <i class="fas fa-file-invoice"></i></a>
                                                </div>
                                                <div class="col-2">
                                                    @if ($negocio->longitud != '' && $negocio->latitud != '')
                                                        {{ Form::open(['route' => 'administrador.finco', 'target' => '_blank']) }}
                                                        <input type="text" class="d-none" name="codineg"
                                                            value="{{ $negocio->id_neg }}">
                                                        <button type="submit" class="btn btn-epc rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Finco">
                                                            <i class="fas fa-crow"></i>
                                                        </button>
                                                        {{ Form::close() }}
                                                    @endif
                                                </div>
                                                <div class="col-4"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
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
                    lengthMenu: '<p class="fw-bold ">Inmuebles consignados</p>',
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

@extends('layouts.administrador')
@section('more_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection
@section('title', 'Editar')

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
                                Asesor
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($propietarios as $propietario)
                            <tr>
                                <td>
                                    <button class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="{{ date('d M Y', strtotime($propietario->created_at)) }}">{{ $propietario->created_at->diffForHumans() }}</button>
                                </td>
                                <td>
                                    <b> {{ $propietario->name }}</b><br />
                                    {{ $propietario->lastname }}
                                </td>
                                <td>
                                    
                                    @foreach ($todos_documentos as $documento)
                                        @if ($documento->id == $propietario->tipo_doc)
                                        {{ $documento->desc_nombres_corto }}          
                                        @endif
                                    @endforeach
                                    <br />
                                    <b> {{ $propietario->doc_number }}</b>
                                    
                                </td>
                                <td>
                                    {{ $propietario->asesor }}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'post']) }}
                                    <input type="text" class="d-none" name="codiprop" value="{{ $propietario->id}}" >    
                                    <button type="submit" class="btn btn-epc rounded-circle"><i
                                                class="fas fa-file-pdf"></i></button>

                                                <i class="far fa-file-pdf"></i>
                                                                                        
                                    {{ Form::close() }}
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
@extends('layouts.main', ['activePage' => 'programa', 'titlePage' => 'Detalles del programa'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Programa</div>
                            <p class="card-category">Datos del Programa - "{{ $programa->program_name }}"</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Codigo del programa</th>
                                                        <td>{{ $programa->id_programa }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nombre del programa</th>
                                                        <td>{{ $programa->program_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sigla</th>
                                                        <td>{{ $programa->sigla }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('programa.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('programa.edit', $programa->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end third-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

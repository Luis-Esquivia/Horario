@extends('layouts.main', ['activePage' => 'aprendiz', 'titlePage' => 'Detalles del Aprendiz'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Aprendiz</div>
                            <p class="card-category">Datos del aprendiz {{ $aprendiz->name }}</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th>
                                                        <td>{{ $aprendiz->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo documento</th>
                                                        <td>{{ $aprendiz->aprendiz->document_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Documento</th>
                                                        <td>{{ $aprendiz->aprendiz->document}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <td>{{ $aprendiz->aprendiz->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Apellido</th>
                                                        <td>{{ $aprendiz->aprendiz->lastname }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('aprendiz.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('aprendiz.edit', $aprendiz->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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

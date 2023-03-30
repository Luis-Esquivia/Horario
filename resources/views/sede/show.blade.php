@extends('layouts.main', ['activePage' => 'sede', 'titlePage' => 'Detalles de la sede'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--Header-->
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Sede</h4>
                            <p class="card-category">Vista detallada de {{ $sede->name }}</p>
                        </div>
                        <!--End header-->
                        <!--Body-->
                        <div class="card-body">
                            <div class="row">
                                <!-- first -->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Nombre de la Sede</th>
                                                        <td>{{ $sede->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Direccion</th>
                                                        <td>{{ $sede->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <td>{{ $sede->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Centro</th>
                                                        <td>{{ $sede->post->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de creacion</th>
                                                        <td>{{ $sede->created_at }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('sede.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('sede.edit', $sede->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

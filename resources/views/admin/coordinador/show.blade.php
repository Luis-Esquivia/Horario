@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Datos del coordinador'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Coordinador</div>
                            <p class="card-category">Datos del coordinador - "{{ $coordinador->name }}"</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Nombre completo</th>
                                                        <td>{{ $coordinador->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Correo</th>
                                                        <td>{{ $coordinador->email }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Centro / Sede</th>
                                                        <td>{{ $coordinador->sede->post->title}} / {{$coordinador->sede->name}}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('coordinador.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('coordinador.edit', $coordinador->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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

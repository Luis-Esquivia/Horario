@extends('layouts.main', ['activePage' => 'ambiente', 'titlePage' => 'Detalles del Ambiente'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Ambiente</div>
                            <p class="card-category">Datos del Ambiente - "{{ $ambiente->name }}"</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Nombre del ambiente</th>
                                                        <td>{{ $ambiente->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sigla</th>
                                                        <td>{{ $ambiente->sigla }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Centro / Sede</th>
                                                        <td>{{ $ambiente->sede->post->title}} / {{$ambiente->sede->name}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('ambiente.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('ambiente.edit', $ambiente->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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

@extends('layouts.main', ['activePage' => 'mallas', 'titlePage' => 'Detalles de la mallas'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Malla</div>
                            <p class="card-category">Vista detallada de la malla</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Id malla</th>
                                                        <td>{{ $malla->id_malla }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <td>{{ $malla->descripcion }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('malla.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('malla.edit', $malla->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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

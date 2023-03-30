@extends('layouts.main', ['activePage' => 'regional', 'titlePage' => 'Detalles de la regional'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Regional</div>
                            <p class="card-category">Vista detallada de la regional --> {{ $regional->name }}</p>
                        </div>
                        <!--body-->
                        <!--Start third-->
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Id regional</th>
                                                <td>{{ $regional->id_regional }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nombre regional</th>
                                                <td>{{ $regional->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="button-container">
                                        <a href="{{ route('regional.index') }}" class="btn btn-sm btn-success mr-3">
                                            Volver </a>
                                        <a href="{{ route('regional.edit', $regional->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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
@endsection

@extends('layouts.main', ['activePage' => 'fichas', 'titlePage' => 'Detalles de la ficha'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Ficha</div>
                            <p class="card-category">Vista detallada de la ficha {{ $ficha->idficha }}</p>
                        </div>
                        <!--body-->
                        <!--Start third-->
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Id ficha</th>
                                                <td>{{ $ficha->idficha }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Estado</th>
                                                <td><span class="badge badge-primary">{{ $ficha->state }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de inicio</th>
                                                <td><span
                                                        class="badge badge-primary">{{ $ficha->ficha_start_date }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de fin</th>
                                                <td><span class="badge badge-primary">{{ $ficha->ficha_end_date }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="button-container">
                                        <a href="{{ route('ficha.index') }}" class="btn btn-sm btn-success mr-3">
                                            Volver </a>
                                        <a href=" {{ route('ficha.edit', $ficha->id) }}"
                                            class="btn btn-sm btn-primary mr-3"> Editar </a>
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

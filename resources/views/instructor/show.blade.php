@extends('layouts.main', ['activePage' => 'instructor', 'titlePage' => 'Datos del Instructor'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Instructor</div>
                            <p class="card-category">Datos del Instructor - "{{ $instructor->instructor->name }}"</p>
                        </div>
                        <!--body-->
                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <td>{{ $instructor->instructor->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de Nacimiento</th>
                                                        <td>{{ $instructor->instructor->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo de documento</th>
                                                        <td>{{ $instructor->instructor->document_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Numero de documento</th>
                                                        <td>{{ $instructor->instructor->document }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de Nacimiento</th>
                                                        <td>{{ $instructor->instructor->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>CIudad de residencia</th>
                                                        <td>{{ $instructor->instructor->residence_city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Correo</th>
                                                        <td>{{ $instructor->instructor->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telefono</th>
                                                        <td>{{ $instructor->instructor->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo de contrato</th>
                                                        <td>{{ $instructor->instructor->contractor_type }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('instructor.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('instructor.edit', $instructor->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
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

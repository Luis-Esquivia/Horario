@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Editar Coordinador'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('coordinador.update', $coordinador->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Coordinador</h4>
                                <p class="card-category">Editar coordinador</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre completo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $coordinador->name) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $coordinador->email) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

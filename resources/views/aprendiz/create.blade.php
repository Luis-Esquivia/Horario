@extends('layouts.main', ['activePage' => 'Aprendiz', 'titlePage' => 'Nuevo Aprendiz'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('aprendiz.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Aprendiz</h4>
                                <p class="card-category">Ingresar datos del nuevo Aprendiz</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="sede_id">
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                <option value="{{$sede->id}}">{{$sede->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label for="document_type" class="col-sm-2 col-form-label">Tipo documento:</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="document_type">
                                                <option selected>Tipo de documento</option>
                                                <option value="CC">Cédula de Ciudadanía</option>
                                                <option value="TI">Tarjeta de identidad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="document" class="col-sm-2 col-form-label">Documento:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="document"
                                            placeholder="Numero Documento" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Ingrese Nombre" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="lastname"
                                            placeholder="Ingrese Apellido" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Ingrese Correo" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!--End body-->

                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Nuevo Coordinador'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('coordinador.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Coordinador</h4>
                                <p class="card-category">Ingresar datos del nuevo Coordinador</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre completo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Ingrese Nombre">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Ingrese Correo">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Ingrese Contraseña">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Asignar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="sede_id">
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                <option value="{{$sede->id}}">{{$sede->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div> --}}
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

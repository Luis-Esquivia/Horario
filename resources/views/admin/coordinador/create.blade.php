@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Nuevo Coordinador'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
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
                                <div class="row justify-content-center">
                                    <div class="col-md-11 mb-3">
                                        <label for="name" class="text-primary col-form-label">Nombre del Coordinador:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre completo" required>
                                    </div>
                                    <div class="col-md-11 mb-3">
                                        <label for="email" class="text-primary col-form-label">Número de Documento del Coordinador:</label>
                                        <input type="number" class="form-control" name="email" placeholder="Ingrese el número de documento" required>
                                    </div>
                                    <div class="col-md-11 mb-3">
                                        <label for="sede" class="text-primary form-label">Seleccione Sede a la cual pertenece:</label>
                                        <div >
                                            <div class="form-group">
                                                <select class="form-control selectpicker" data-style="btn btn-link" name="sede_id">
                                                    @php
                                                        use App\Models\Sede;
                                                        $sedes = Sede::all();
                                                    @endphp
                                                    @foreach ($sedes as $sede)
                                                        <option value="{{$sede->name}}">{{$sede->name}}</option>
                                                    @endforeach
                                                </select>
                                              </div>
                                        </div>
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

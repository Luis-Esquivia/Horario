@extends('layouts.main', ['activePage' => 'competencia', 'titlePage' => 'Nuevo Programa'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('competencia.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Competencia</h4>
                                <p class="card-category">Datos de la competencia</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar malla</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="malla_id">
                                                @foreach (App\Models\Malla::all() as $malla)
                                                    <option value="{{ $malla->id }}">{{ $malla->programa->program_name ." / trimestre ". $malla->trimestre}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Ingrese nombre" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar tipo</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="tipo">
                                                    <option value="normal">Normal</option>
                                                    <option value="complemento">Complementario</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="id_regional" class="col-sm-2 col-form-label">Horas</label>
                                    <div class="col-sm-7">
                                      <input type="number" class="form-control" name="horas" placeholder="Ingrese cantidad de horas"
                                        autocomplete="off" autofocus>
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

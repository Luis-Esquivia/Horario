@extends('layouts.main', ['activePage' => 'resultado', 'titlePage' => 'Nuevo Resultado'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('resultado.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Resultado de aprendizaje</h4>
                                <p class="card-category">Ingresar datos del resultado</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Asignar competencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="competencia_id">
                                                @foreach (App\Models\Competencia::orderBy('name')->get() as $competencia)
                                                <option value="{{$competencia->id}}">{{$competencia->malla->programa->program_name." / ".$competencia->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Identificacion</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="identificacion"
                                            placeholder="Ingrese identificacion" autocomplete="off">
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

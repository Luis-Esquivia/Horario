@extends('layouts.main', ['activePage' => 'resultado', 'titlePage' => 'Editar Resultado de aprendizaje'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('resultado.update', $resultado->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ambiente</h4>
                                <p class="card-category">Editar Ambiente</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre del Resultado de aprendizaje:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="descripcion"
                                            value="{{ old('descripcion', $resultado->descripcion) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Identificacion:</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="identificacion"
                                            value="{{ old('identificacion', $resultado->identificacion) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Asignar competencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="competencia_id">
                                                @foreach (App\Models\Competencia::orderBy('name')->get() as $resultado)
                                                <option value="{{$resultado->id}}">{{$resultado->competencia_id}}</option>
                                                @endforeach
                                            </select>
                                          </div>
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

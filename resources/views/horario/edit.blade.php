@extends('layouts.main', ['activePage' => 'fichas', 'titlePage' => 'Editar ficha'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('ficha.update', $ficha->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ficha</h4>
                                <p class="card-category">Editar Ficha</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar programa</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="programa_id">
                                                @foreach (App\Models\Programa::orderBy('program_name')->get() as $programa)
                                                <option value="{{$programa->id}}">{{$programa->program_name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label for="grupo" class="col-sm-2 col-form-label">Grupo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="grupo"
                                        value="{{ old('grupo', $ficha->grupo) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="idficha" class="col-sm-2 col-form-label">Ficha:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="idficha"
                                            value="{{ old('idficha', $ficha->idficha) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Estado de la ficha</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="state" value="{{ old('state', $ficha->state) }}">
                                                    <option value="ACTIVO">ACTIVO</option>
                                                    <option value="INACTIVO">INACTIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="ficha_start_date" class="col-sm-2 col-form-label">Ficha de inicio:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="ficha_start_date"
                                            value="{{ old('ficha_start_date', $ficha->ficha_start_date) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="ficha_end_date" class="col-sm-2 col-form-label">Ficha de fin:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="ficha_end_date"
                                            value="{{ old('ficha_end_date', $ficha->ficha_end_date) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="sede_id">
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                    <option value="{{ $sede->id }}">{{ $sede->name }}</option>
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


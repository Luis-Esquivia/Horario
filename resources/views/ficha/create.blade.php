@extends('layouts.main', ['activePage' => 'fichas', 'titlePage' => 'Nueva ficha'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('ficha.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ficha</h4>
                                <p class="card-category">Ingresar datos de la ficha</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar programa</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="programa_id">
                                                @foreach (App\Models\Programa::orderBy('program_name')->get() as $programa)
                                                    <option value="{{ $programa->id }}">{{ $programa->program_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="grupo" class="col-sm-2 col-form-label">Grupo:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="grupo" placeholder="Ingrese grupo"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="idficha" class="col-sm-2 col-form-label">Ficha:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="idficha"
                                            placeholder="Ingrese id ficha" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Estado de la ficha</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="state">
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
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="ficha_end_date" class="col-sm-2 col-form-label">Ficha de fin:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="ficha_end_date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="sede_id">
                                                @if (Auth::user()->hasRole('admin'))
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                <option value="{{ $sede->id }}">{{ $sede->name }}</option>
                                                @endforeach
                                                @else
                                                @foreach (Auth::user()->sedes as $sede)
                                                    <option value="{{ $sede->id }}">{{ $sede->name }}</option>
                                                @endforeach
                                                @endif

                                            </select>
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

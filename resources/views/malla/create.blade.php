@extends('layouts.main', ['activePage' => 'mallas', 'titlePage' => 'Nueva malla'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('malla.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Malla</h4>
                                <p class="card-category">Ingresar datos de la malla</p>
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
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar trimestre</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="trimestre">
                                                <option value="1">Trimestre 1</option>
                                                <option value="2">Trimestre 2</option>
                                                <option value="3">Trimestre 3</option>
                                                <option value="4">Trimestre 4</option>
                                                <option value="5">Trimestre 5</option>
                                                <option value="6">Trimestre 6</option>
                                                <option value="7">Trimestre 7</option>
                                                <option value="8">Trimestre 8</option>
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
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

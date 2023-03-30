@extends('layouts.main', ['activePage' => 'ambiente', 'titlePage' => 'Nuevo ambiente'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('ambiente.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title"> Ambiente</h4>
                                <p class="card-category">Ingresar datos del ambiente</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">

                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre ambiente</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nombre del ambiente" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Sigla del ambiente</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="sigla"
                                            placeholder="Ingrese sigla" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Asignar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="sede_id">
                                                @if (Auth::user()->hasRole('coordinador'))
                                                @foreach (Auth::user()->sedes as $sede)
                                                <option value="{{$sede->id}}">{{$sede->name}}</option>
                                                @endforeach
                                                @else
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                <option value="{{$sede->id}}">{{$sede->name}}</option>
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

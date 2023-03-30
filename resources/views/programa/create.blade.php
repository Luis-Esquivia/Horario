@extends('layouts.main', ['activePage' => 'programa', 'titlePage' => 'Nuevo Programa'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('programa.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Programa</h4>
                                <p class="card-category">Ingresar datos del programa</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="id_programa" class="col-sm-2 col-form-label">Id programa</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="id_programa"
                                            placeholder="Id del programa" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="program_name" class="col-sm-2 col-form-label">Nombre programa</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="program_name"
                                            placeholder="Nombre del programa" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Sigla del programa</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="sigla"
                                            placeholder="Ingrese sigla" autocomplete="off">
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

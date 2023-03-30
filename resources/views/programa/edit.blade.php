@extends('layouts.main', ['activePage' => 'programa', 'titlePage' => 'Editar Programa'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('programa.update', $programa->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Programa</h4>
                                <p class="card-category">Editar Programa</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="id_programa" class="col-sm-2 col-form-label">Codigo del programa:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="id_programa"
                                            value="{{ old('id_programa', $programa->id_programa) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="program_name" class="col-sm-2 col-form-label">Nombre del programa:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="program_name"
                                            value="{{ old('program_name', $programa->program_name) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Sigla:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="sigla"
                                            value="{{ old('sigla', $programa->sigla) }}">
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

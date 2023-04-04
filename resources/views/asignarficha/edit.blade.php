@extends('layouts.main', ['activePage' => 'asignarficha', 'titlePage' => 'Editar ficha'])
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
                                <p class="card-category">Editarr Ficha</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="idficha" class="col-sm-2 col-form-label">Id ficha:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="idficha"
                                            value="{{ old('idficha', $ficha->idficha) }}" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="state" class="col-sm-2 col-form-label">Estado:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="state"
                                            value="{{ old('state', $ficha->state) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="ficha_start_date" class="col-sm-2 col-form-label">Ficha de inicio:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="ficha_start_date"
                                            value="{{ old('ficha_start_date', $ficha->ficha_start_date) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="ficha_end_date" class="col-sm-2 col-form-label">Ficha de fin:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="ficha_end_date"
                                            value="{{ old('ficha_end_date', $ficha->ficha_end_date) }}">
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


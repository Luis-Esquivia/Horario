@extends('layouts.main', ['activePage' => 'ambiente', 'titlePage' => 'Editar Ambiente'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="{{ route('ambiente.update', $ambiente->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ambiente</h4>
                                <p class="card-category">Editar Ambiente</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre del ambiente:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $ambiente->name) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sigla" class="col-sm-2 col-form-label">Sigla:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="sigla"
                                            value="{{ old('sigla', $ambiente->sigla) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Asignar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" name="sede_id">
                                                @foreach (App\Models\Sede::orderBy('name')->get() as $sede)
                                                <option value="{{$sede->id}}">{{$sede->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-facebook">Actualizar</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

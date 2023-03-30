@extends('layouts.main', ['activePage' => 'Aprendiz', 'titlePage' => 'Editar Aprendiz'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('aprendiz.update', $aprendiz->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Aprendiz</h4>
                                <p class="card-category">Editar aprendiz</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="document_type" class="col-sm-2 col-form-label">Tipo documento:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="document_type"
                                            value="{{ old('document_type', $aprendiz->document_type) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="document" class="col-sm-2 col-form-label">Documento:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="document"
                                            value="{{ old('document', $aprendiz->document) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $aprendiz->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ old('lastname', $aprendiz->lastname) }}">
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

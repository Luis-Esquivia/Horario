@extends('layouts.main', ['activePage' => 'Instructor', 'titlePage' => 'Editar Instructor'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('instructor.update', $instructor->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Instructor</h4>
                                <p class="card-category">Editar instructor</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="sede" class="col-sm-2 col-form-label">Seleccionar sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="sede_id">
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
                                <div class="row">
                                    <label for="document_type" class="col-sm-2 col-form-label">Tipo documento:</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="document_type">
                                                <option>Tipo de documento</option>
                                                <option @if(strtoupper($instructor->instructor->document_type)==="CC") selected @endif value="CC">Cédula de Ciudadanía</option>
                                                <option @if(strtoupper($instructor->instructor->document_type)==="TI") selected @endif  value="TI">Tarjeta de identidad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="document" class="col-sm-2 col-form-label">Documento:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="document"
                                            value="{{ old('document', $instructor->instructor->document) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $instructor->instructor->name) }}">
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
                                            value="{{ old('lastname', $instructor->instructor->lastname) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="birthday" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="birthday"
                                            value="{{ old('birthday', $instructor->instructor->birthday) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="residence_city" class="col-sm-2 col-form-label">Ciudad de residencia:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="residence_city"
                                            value="{{ old('residence_city', $instructor->instructor->residence_city) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $instructor->instructor->email) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="phone" class="col-sm-2 col-form-label">Telefono:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone', $instructor->instructor->phone) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="contractor_type" class="col-sm-2 col-form-label">Tipo de contrato: </label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                name="contractor_type">
                                                <option>Tipo de documento</option>
                                                <option @if($instructor->instructor->contractor_type=="38")selected @endif value="38">Planta</option>
                                                <option @if($instructor->instructor->contractor_type=="42")selected @endif value="42">Contratista</option>
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

@extends('layouts.main', ['activePage' => 'asignarficha', 'titlePage' => 'Asignar ficha a usuario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('asignarficha.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Asignar ficha</h4>
                                <p class="card-category">Asignar ficha a usuario</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="row">
                                <label for="sede" class="col-sm-2 col-form-label">Seleccionar usuario</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="sede" class="col-sm-2 col-form-label">Asignar ficha</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="ficha_id">
                                            @foreach (App\Models\Ficha::orderBy('idficha')->get() as $ficha)
                                            <option value="{{$ficha->id}}">{{$ficha->idficha." - ".$ficha->programa->sigla."". $ficha->grupo}}</option>
                                            @endforeach
                                        </select>
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

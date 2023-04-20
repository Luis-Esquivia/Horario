@extends('layouts.main', ['activePage' => 'sede', 'titlePage' => 'Nueva Sede'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <form method="POST" action="{{ route('sede.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sede</h4>
              <p class="card-category">Ingresar datos de la sede</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="sede" class="col-sm-2 col-form-label">Nombre sede</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre de la sede"
                    autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="address" class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="address" placeholder="Ingrese direccion"
                    autocomplete="off" >
                </div>
              </div>
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" placeholder="Descripcion"
                    autocomplete="off">
                </div>
              </div>
              <div class="row">
                <label for="region" class="col-sm-2 col-form-label">selecciona centro de formacion</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <select class="form-control selectpicker" data-style="btn btn-link" name="post_id">
                            @foreach (App\Models\Post::orderBy('title')->get() as $post)
                            <option value="{{$post->id}}">{{$post->title}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
              </div>
              <div class="row">
                <label for="region" class="col-sm-2 col-form-label">selecciona Coordinador</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <select class="form-control selectpicker" data-style="btn btn-link" name="user_id">
                            @foreach (App\Models\User::whereHas('roles',function($q){
                                $q->where('name', 'coordinador');
                            })->get() as $coordinador)
                            <option value="{{$coordinador->id}}">{{$coordinador->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-facebook">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

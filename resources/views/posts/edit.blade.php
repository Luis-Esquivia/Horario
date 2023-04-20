@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Editar centro'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar Centro</h4>
              <p class="card-category">Datos del Centro --> {{($post->title)}}</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre"
                    value="{{ old('title', $post->title) }}" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripcion"
                    value="{{ old('descripcion', $post->descripcion) }}" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <label for="region" class="col-sm-2 col-form-label">selecciona la region</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <select class="form-control selectpicker" data-style="btn btn-link" name="regional_id">
                            @foreach (App\Models\Regional::all() as $regional)
                            <option value="{{$regional->id}}">{{$regional->name}}</option>
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
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

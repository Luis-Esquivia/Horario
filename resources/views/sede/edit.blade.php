@extends('layouts.main', ['activePage' => 'sede', 'titlePage' => 'Editar sede'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('sede.update', $sede->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar Sede</h4>
              <p class="card-category">Datos de la sede {{ $sede->name }}</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre de la sede</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre"
                    value="{{ old('name', $sede->name ) }}" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="address" class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="address" placeholder="Ingrese la direccion"
                    value="{{ old('address', $sede->address) }}" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" placeholder="Ingrese la descripcion"
                    value="{{ old('description', $sede->description) }}" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <label for="region" class="col-sm-2 col-form-label">centro de formacion</label>
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
            </div>
            <!--End body-->
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

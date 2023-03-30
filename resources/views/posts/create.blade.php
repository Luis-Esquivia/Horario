@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Nuevo Centro'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Centro</h4>
              <p class="card-category">Ingresar datos del nuevo Centro</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre Centro</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre del centro"
                    autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="descripcion" placeholder="Descripcion"
                    autocomplete="off" autofocus>
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

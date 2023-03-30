@extends('layouts.main', ['activePage' => 'mallas', 'titlePage' => 'Editar malla'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('malla.update', $malla->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar malla</h4>
              <p class="card-category">Editar datos de la malla</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="id_malla" class="col-sm-2 col-form-label">Id regional</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="id_malla" placeholder="Ingrese el id"
                    value="{{ old('id_malla', $malla->id_malla) }}" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripcion"
                    value="{{ old('descripcion', $malla->descripcion) }}" autocomplete="off">
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

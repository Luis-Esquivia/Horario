@extends('layouts.main', ['activePage' => 'regional', 'titlePage' => 'Editar regional'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <form method="POST" action="{{ route('regional.update', $regional->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar Regional</h4>
              <p class="card-category">Editar datos de Regional</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="id_regional" class="col-sm-2 col-form-label">Id regional</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="id_regional" placeholder="Ingrese el id"
                    value="{{ old('id_regional', $regional->id_regional) }}" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre"
                    value="{{ old('name', $regional->name) }}" autocomplete="off">
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

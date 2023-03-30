@extends('layouts.main', ['activePage' => 'regional', 'titlePage' => 'Nueva regional'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('regional.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Regional</h4>
              <p class="card-category">Ingresar datos de la regional</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="id_regional" class="col-sm-2 col-form-label">Id regional</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="id_regional" placeholder="Ingrese id de la regional"
                    autocomplete="off" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre de la regional</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese nombre"
                    autocomplete="off" autofocus>
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

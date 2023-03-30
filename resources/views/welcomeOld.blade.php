@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('SISTEMA DE HORARIO')])
@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
           <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
             <h3>{{ __('SISTEMA DE HORARIO') }}</h3>
           </div>
            <div class="col-12 ml-auto mr-auto">
                <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('BIENVENIDO') }}</strong></h4>
                        </div>
                    <div class="card-body">
                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                </div>
                                <input type="text" name="email" id="search" class="form-control" placeholder="{{ __('Buscar grupo') }}"
                                    value="{{ old('email', null) }}" autofocus>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px;margin-bottom:30px" id="content_options">


                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table" style="table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Hora</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miercoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_horarios">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
           </div>
           </div>



@endsection
@section('script')
<script>
    $('#search').on('keyup',function(){
        if($(this).val().length>2){
            $.ajax({
            type: "POST",
            url: 'load/fichas/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data)
            {

                $("#content_options").html(data);
           }
       });
        }

    });
    $(document).on('click','.btn_ficha',function(){
        $.ajax({
            type: "POST",
            url: 'load/ficha/horario/'+$(this).data("id"),
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data)
            {
                $("#content_horarios").html(data);
           }
       });
    });
</script>
@endsection

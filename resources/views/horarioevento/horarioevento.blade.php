@extends('layouts.main', ['activePage' => 'horarioevento', 'titlePage' => 'Horario Eventos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Horario extra</h4>
                            <p class="card-category">Horario</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-sm-12">
                                    <label for="region" class="col-12 col-form-label">Filtrar instructores</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" data-style="btn btn-link"
                                                id="search"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="content_options">


                            </div>
                            <div class="table-responsive" id="content_horarios">

                            </div>
                            <!--Footer-->
                            <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar horario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col">
                <label for="region" class="col-12 col-form-label">Nombre del evento</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control selectpicker" data-style="btn btn-link"
                                                id="nombre">
                                        </div>
                                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="region" class="col-12 col-form-label">Hora de inicio</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="hora_inicial" disabled step="1800" type="time" class="form-control" placeholder="Hora de inicio"/>
                                        </div>
                                    </div>
            </div>
            <div class="col">
                <label for="region" class="col-12 col-form-label">Hora finalización</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="hora_final" step="1800" type="time" class="form-control" placeholder="Hora de inicio"/>
                                        </div>
                                    </div>
            </div>
            <input type="hidden" id="input_user"/>
            <input type="hidden" id="input_day"/>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="guardar">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Editar-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar horario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="region" class="col-12 col-form-label">Nombre del evento</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="nombre_edit" type="text" class="form-control"/>
                                        </div>
                                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="region" class="col-12 col-form-label">Hora de inicio</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="hora_inicial_edit" step="1800" type="time" class="form-control" placeholder="Hora de inicio"/>
                                        </div>
                                    </div>
            </div>
            <div class="col">
                <label for="region" class="col-12 col-form-label">Hora finalización</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="hora_final_edit" step="1800" type="time" class="form-control" placeholder="Hora de inicio"/>
                                        </div>
                                    </div>
            </div>
            <input type="hidden" id="horario_id"/>
            <input type="hidden" id="day_edit_id"/>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="borrar">Eliminar</button>
          <button type="button" class="btn btn-primary" id="editar">Guardar</button>
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
            url: 'load/instructores/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data)
            {

                $("#content_options").html(data);
           }
       });
        }

    });
    $(document).on('click','.btn_instructor',function(){
        $.ajax({
            type: "POST",
            url: 'load/instructor/horario/'+$(this).data("id"),
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data)
            {
                $("#content_horarios").html(data);
           }
       });
    });
    $(document).on('click',".btn_add",function(){
        $("#hora_inicial").val($(this).data("hour"));
        $("#hora_final").attr("min",$(this).data("hour"));
        $("#input_day").val($(this).data("day"));
        $("#input_user").val($(this).data("id"));
    });
    $(document).on('click',".btn_edit",function(){
        $("#hora_inicial_edit").val($(this).data("inicial"));
        $("#hora_final_edit").val($(this).data("final"));
        $("#nombre_edit").val($(this).data("description"));
        $("#horario_id").val($(this).data("id"));
        $("#day_edit_id").val($(this).data("day"));
    });
    $("#guardar").click(function(){
        $.ajax({
            type: "POST",
            url: 'save/evento',
            data: {"_token": "{{ csrf_token() }}",
            "inicio":$("#hora_inicial").val(),
            "fin":$("#hora_final").val(),
            "user":$("#input_user").val(),
            "day":$("#input_day").val(),
            "description":$("#nombre").val(),
        },
            success: function(data)
            {
                if(data=="error"){
                    alert("Intenta con otra hora, esta ya esta en uso");
                }
                else if(data=="error-i"){
                    alert("Este instructor ya tiene clases a esta hora");
                }
                else if(data=="error-hour"){
                    alert("La hora inicial no puede ser mayor que la final");
                }
                else if(data=="error-time"){
                    alert("Esta superando las horas disponibles del instructor");
                }
                else{
                    $("#content_horarios").html(data);
                    $("#nombre").val("");
                    $("#hora_final").val("");
                    $('.close').click();
                }

           }
       });
    });
    $("#editar").click(function(){
        $.ajax({
            type: "POST",
            url: 'edit/evento/'+$("#horario_id").val(),
            data: {"_token": "{{ csrf_token() }}",
            "inicio":$("#hora_inicial_edit").val(),
            "final":$("#hora_final_edit").val(),
            "description":$("#nombre_edit").val(),
            "day":$("#day_edit_id").val()
        },
            success: function(data)
            {
                if(data=="error"){
                    alert("Intenta con otra hora, esta ya esta en uso");
                }
                else if(data=="error-i"){
                    alert("Este instructor ya tiene clases a esta hora");
                }
                else if(data=="error-hour"){
                    alert("La hora inicial no puede ser mayor que la final");
                }else if(data=="error-time"){
                    alert("Esta superando las horas disponibles del instructor");
                }
                else{
                    $("#content_horarios").html(data);
                    $('.close').click();
                }


           }
       });
    });
    $("#borrar").click(function(){

        $.ajax({
            type: "POST",
            url: 'delete/evento/'+$("#horario_id").val(),
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data)
            {
                $("#content_horarios").html(data);
                $('.close').click();
           }
       });
    });
</script>
@endsection

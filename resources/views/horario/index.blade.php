@extends('layouts.main', ['activePage' => 'horario', 'titlePage' => 'Horario'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Horario</h4>
                            <p class="card-category">Horario</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-sm-12">
                                    <label for="region" class="col-12 col-form-label">selecciona la region</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                id="regional" @if (Auth::user()->hasRole('coordinador'))
                                            disabled
                                                @endif>
                                                @if (Auth::user()->hasRole('admin'))
                                                <option >Selecciona una region</option>
                                                @foreach (App\Models\Regional::all() as $regional)
                                                    <option value="{{ $regional->id }}">{{ $regional->name }}</option>
                                                @endforeach
                                                @else
                                                @php
                                                    $region=Auth::user()->sedes()->first()->post->regional;
                                                @endphp
                                                <option value="{{$region->id}}">{{$region->name}}</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-12">
                                    <label for="region" class="col-12 col-form-label">selecciona el centro</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link" id="post" @if (Auth::user()->hasRole('coordinador'))
                                                disabled
                                                    @endif>
                                                    @if (Auth::user()->hasRole('coordinador'))
                                                    @php
                                                    $post=Auth::user()->sedes()->first()->post;
                                                @endphp
                                                <option value="{{$post->id}}">{{$post->title}}</option>

                                                    @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-12">
                                    <label for="region" class="col-12 col-form-label">selecciona la sede</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                id="sede">
                                                @if (Auth::user()->hasRole('coordinador'))
                                                <option >Selecciona una sede</option>
                                                    @foreach (Auth::user()->sedes as $sede)
                                                    <option value="{{$sede->id}}">{{$sede->name}}</option>

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-12">
                                    <label for="region" class="col-12 col-form-label">selecciona la Ficha</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                id="ficha">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="content_ambiente">

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
                <label for="region" class="col-12 col-form-label">Selecciona la competencia</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                id="select_competencia">

                                            </select>
                                        </div>
                                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="region" class="col-12 col-form-label">Selecciona el instructor</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control selectpicker" data-style="btn btn-link"
                                                id="select_instructor">

                                            </select>
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
            <input type="hidden" id="ambiente_id"/>
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
<!-- Modal -->
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
                <label for="region" class="col-12 col-form-label">competencia</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="competencia_name_edit" type="text" class="form-control" disabled/>
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
            <input type="hidden" id="ambiente_edit_id"/>
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
    $("#regional").on("change",function(){
        $("#sede").html("");
        $("#post").html("");
        $("#ficha").html("");
        $("#content_ambiente").html("");
        $.ajax({
            type: "POST",
            url: 'load/regional/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"
        },
            success: function(data)
            {
                $("#post").html(data);
           }
       });
    });
    $("#post").on("change",function(){
        $("#sede").html("");
        $("#ficha").html("");
        $("#content_ambiente").html("");
        $.ajax({
            type: "POST",
            url: 'load/post/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"
        },
            success: function(data)
            {
                $("#sede").html(data);
           }
       });
    });
    $("#sede").on("change",function(){
        $("#ficha").html("");
        $("#content_ambiente").html("");
        $.ajax({
            type: "POST",
            url: 'load/sede/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"
        },
            success: function(data)
            {
                $("#ficha").html(data);
           }
       });
    });
    $("#ficha").on("change",function(){
       // $("#content_ambiente").html("");
        $.ajax({
            type: "POST",
            url: 'load/ambiente/'+$(this).val(),
            data: {"_token": "{{ csrf_token() }}"
        },
            success: function(data)
            {
                $("#content_ambiente").html(data.ambientes);
                $("#select_instructor").html(data.instructores);
                $("#select_competencia").html(data.competencias);
           },error:function(err,msg){
            $("#content_ambiente").html("");

           }
       });
    });
    $(document).on('click','.eliminar_horario',function(){
        if (window.confirm("¿Seguro deseas eliminar todo el horario? todos los ambientes quedaran vacios!")) {
  $.ajax({
      type:"POST",
      url: 'delete/horariosede/'+$("#sede").val()+"/"+$('#ficha').val(),
      data: {"_token": "{{ csrf_token() }}"},
      success:function(data){
          alert("Se a borrado todo el horario de esta sede");
        $("#content_ambiente").html(data.ambientes);
        $("#select_instructor").html(data.instructores);
        $("#select_competencia").html(data.competencias);
      }
  })
}
    });
    $("#guardar").click(function(){
        $.ajax({
            type: "POST",
            url: 'save/horario',
            data: {"_token": "{{ csrf_token() }}",
            "competencia":$("#select_competencia").val(),
            "instructor":$("#select_instructor").val(),
            "inicio":$("#hora_inicial").val(),
            "fin":$("#hora_final").val(),
            "ambiente":$("#ambiente_id").val(),
            "day":$("#input_day").val(),
            "ficha":$("#ficha").val(),
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
                    $("#ambiente_"+$("#ambiente_id").val()).html(data.ambiente);
                    $("#select_instructor").html(data.instructores);
                    $('.close').click();
                }

           }
       });
    });
    $("#editar").click(function(){
        $.ajax({
            type: "POST",
            url: 'edit/horario/'+$("#horario_id").val(),
            data: {"_token": "{{ csrf_token() }}",
            "inicio":$("#hora_inicial_edit").val(),
            "final":$("#hora_final_edit").val(),
            "ambiente":$("#ambiente_edit_id").val(),
            "day":$("#day_edit_id").val(),
            "ficha":$("#ficha").val(),
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
                    $("#ambiente_"+$("#ambiente_id").val()).html(data.ambiente);
                    $("#select_instructor").html(data.instructores);
                    $('.close').click();
                }


           }
       });
    });
    $("#borrar").click(function(){

        $.ajax({
            type: "POST",
            url: 'delete/horario/'+$("#horario_id").val(),
            data: {"_token": "{{ csrf_token() }}",
            "ficha":$("#ficha").val(),
            "ambiente":$("#ambiente_edit_id").val()
        },
            success: function(data)
            {
                $("#ambiente_"+$("#ambiente_id").val()).html(data.ambiente);
                    $("#select_instructor").html(data.instructores);
                    $('.close').click();



           }
       });
    });
    $(document).on('click',".btn_add",function(){
        $("#hora_inicial").val($(this).data("hour"));
        $("#hora_final").attr("min",$(this).data("hour"));
        $("#ambiente_id").val($(this).data("ambiente"));
        $("#input_day").val($(this).data("day"));
    });
    $(document).on('click',".btn_edit",function(){
        $("#hora_inicial_edit").val($(this).data("inicial"));
        $("#hora_final_edit").val($(this).data("final"));
        $("#competencia_name_edit").val($(this).data("competencia"));
        $("#horario_id").val($(this).data("id"));
        $("#ambiente_edit_id").val($(this).data("ambiente"));
        $("#day_edit_id").val($(this).data("day"));
    });
</script>
@endsection

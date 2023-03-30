@extends('layouts.main', ['activePage' => 'programa', 'titlePage' => 'Programa'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Programa</h4>
                            <p class="card-category">Lista de programa</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <form action="{{route('programa.load.excel')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                      <input type="file" name="file">
                                       <button type="submit" class="btn btn-sm btn-facebook">Importar Excel</button>
                                       <a class="btn btn-sm btn-warning" href="{{asset('excel/plantillaprograma.xlsx')}}" target="_blank"> Descargar Plantilla</a>
                                    </form>
                                    <a href="{{ route('programa.create') }}" class="btn btn-sm btn-facebook">Añadir
                                        Programa</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Codigo Programa </th>
                                        <th> Nombre programa</th>
                                        <th> Sigla </th>
                                        <th> Malla </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($programa as $programa)
                                            <tr>
                                                <td>{{ $programa->id_programa }}</td>
                                                <td>{{ $programa->program_name }}</td>
                                                <td>{{ $programa->sigla }}</td>
                                                <td><button data-id={{$programa->id}} data-toggle="modal" data-target="#programaModal" class="btn btn-info btn-sm btn_malla">Ver malla</button></td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('programa.show', $programa->id) }}"
                                                        class="btn btn-info">
                                                        <i class="material-icons">person</i> </a>
                                                    <a href="{{ route('programa.edit', $programa->id) }}"
                                                        class="btn btn-success"> <i class="material-icons">edit</i> </a>
                                                    <form action="{{ route('programa.destroy', $programa->id) }}"
                                                        method="post"
                                                        onsubmit="return confirm('Quieres eliminar esta Ficha?')"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn btn-danger">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="programaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Malla</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="content_malla">


            </div>
            </div>

          </div>
        </div>
      </div>
@endsection
@section('script')
<script>
$(document).on("click",".btn_malla",function(){

        $.ajax({
            type: "POST",
            url: 'load/malla/'+$(this).data("id"),
            data: {"_token": "{{ csrf_token() }}"
        },
            success: function(data)
            {
                $("#content_malla").html(data);
           }
       });
    });
</script>
@endsection

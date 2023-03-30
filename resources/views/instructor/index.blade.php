@extends('layouts.main', ['activePage' => 'instructor', 'titlePage' => 'Instructores'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Instructores</h4>
                    <p class="card-category">Instructores registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                          <form action="{{route('instructor.load.excel')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <input type="file" name="file">
                           <button type="submit" class="btn btn-sm btn-facebook">Importar Excel</button>
                           <a class="btn btn-sm btn-warning" href="{{asset('excel/PlantillaInstructor.xlsx')}}" target="_blank"> Descargar Plantilla</a>
                        </form>
                        <a href="{{ route('instructor.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                            <th> Tipo Documento </th>
                            <th> Documento </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Telefono </th>
                            <th> Centro/sede </th>
                            <th class="text-right"> Acciones </th>
                        </thead>
                        <tbody>
                            @forelse ($users as $instructor)
                            <tr>
                                <td>{{ $instructor->instructor->document_type }}</td>
                                <td>{{ $instructor->instructor->document }}</td>
                                <td>{{ $instructor->instructor->name }}</td>
                                <td>{{ $instructor->instructor->lastname }}</td>
                                <td>{{ $instructor->instructor->phone }}</td>
                                <td>
                                    @foreach ($instructor->sedes as $sede)
                                        {{ $sede->post->title}} / {{$sede->name}}<br>
                                    @endforeach</td>
                              <td class="td-actions text-right">

                                <a href="{{ route('instructor.show', $instructor->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>


                                <a href="{{ route('instructor.edit', $instructor->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>


                                <form action="{{ route('instructor.destroy', $instructor->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

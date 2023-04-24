@extends('layouts.main', ['activePage' => 'coordinador', 'titlePage' => 'Coordinador'])

@section('content')
    <div class="content">
            <div class="row m-md-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Coordinadores</h4>
                            <p class="card-category">Lista de Coordinadore</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <a href="{{ route('coordinador.create') }}" class="btn btn-facebook">Añadir Coordinador</a>
                                </div>
                            </div>
                            <div class="px-md-3">
                                <table id="tableReference" class="table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead class="text-primary">
                                        <th> Nombre </th>
                                        <th> Correo </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($coordinadors as $coordinador)
                                            <tr>
                                                <td>{{ $coordinador->name }}</td>
                                                <td>{{ $coordinador->email }}</td>
                                                <td class="td-actions text-right">
                                                        <a href="{{ route('coordinador.edit', $coordinador->id) }}"
                                                            class="btn btn-warning"> <i class="material-icons">edit</i> Editar</a>


                                                        <form action="{{ route('coordinador.destroy', $coordinador->id) }}" method="post"
                                                            onsubmit="return confirm('Quieres borrar este Coordinador?')"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="btn btn-danger">
                                                                <i class="material-icons">close</i> Eliminar
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
    @section('script')
       <script src="{{ asset('js/main/main-ad.js')}}"></script>
    @endsection
@endsection

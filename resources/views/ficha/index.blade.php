@extends('layouts.main', ['activePage' => 'fichas', 'titlePage' => 'Fichas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Fichas</h4>
                            <p class="card-category">Lista de fichas</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">

                                        <a href="{{ route('ficha.create') }}" class="btn btn-sm btn-facebook">Añadir
                                            Ficha</a>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Ficha </th>
                                        <th> Programa </th>
                                        <th> Estado </th>
                                        <th> Fecha de inicio </th>
                                        <th> Fecha de fin </th>
                                        <th> Grupo </th>
                                        <th>Centro/Sede </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($ficha as $ficha)
                                            <tr>
                                                <td>{{ $ficha->idficha }}</td>
                                                <td>{{ $ficha->programa->program_name }}</td>
                                                <td>{{ $ficha->state }}</td>
                                                <td>{{ $ficha->ficha_start_date }}</td>
                                                <td>{{ $ficha->ficha_end_date }}</td>
                                                <td>{{$ficha->programa->sigla."".$ficha->grupo }}</td>
                                                <td>{{$ficha->sede->post->title."/".$ficha->sede->name}}</td>
                                                <td class="td-actions text-right">

                                                        <a href="{{ route('ficha.show', $ficha->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">person</i> </a>


                                                        <a href="{{ route('ficha.edit', $ficha->id) }}"
                                                            class="btn btn-success"> <i class="material-icons">edit</i> </a>


                                                        <form action="{{ route('ficha.destroy', $ficha->id) }}" method="post"
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
                        <!--Footer-->

                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

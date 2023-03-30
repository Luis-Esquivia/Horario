@extends('layouts.main', ['activePage' => 'aprendiz', 'titlePage' => 'Aprendiz'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Aprendices</h4>
                            <p class="card-category">Lista de Aprendices</p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('aprendiz.create') }}" class="btn btn-sm btn-facebook">Añadir
                                        Aprendiz</a>
                                    <form action="{{ route('aprendiz.load.excel') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file">
                                        <button type="submit" class="btn btn-sm btn-facebook">Importar Excel</button>
                                    </form>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="text-primary">
                                        <th> Tipo documento </th>
                                        <th> Documento </th>
                                        <th> Nombre </th>
                                        <th> Apellido </th>
                                        <th> Centro/Sede </th>
                                        <th class="text-right"> Acciones </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $aprendiz)
                                            <tr>
                                                <td>{{ $aprendiz->aprendiz->document_type }}</td>
                                                <td>{{ $aprendiz->aprendiz->document }}</td>
                                                <td>{{ $aprendiz->aprendiz->name }}</td>
                                                <td>{{ $aprendiz->aprendiz->lastname }}</td>
                                                <td>{{ $aprendiz->sede->post->title }}/{{ $aprendiz->sede->name }}</td>
                                                <td class="td-actions text-right">

                                                    <a href="{{ route('aprendiz.show', $aprendiz->id) }}"
                                                        class="btn btn-info">
                                                        <i class="material-icons">person</i> </a>


                                                    <a href="{{ route('aprendiz.edit', $aprendiz->id) }}"
                                                        class="btn btn-success"> <i class="material-icons">edit</i> </a>


                                                    <form action="{{ route('aprendiz.destroy', $aprendiz->id) }}"
                                                        method="post"
                                                        onsubmit="return confirm('Quieres borrar este Aprendiz?')"
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
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="card-footer mr-auto">
                            {{ $users->links() }}
                        </div>
                        <!--End footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Detalles del centro'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--Header-->
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Centro</h4>
                            <p class="card-category">Detalles del centro --> {{ $post->title }}</p>
                        </div>
                        <!--End header-->
                        <!--Body-->
                        <div class="card-body">
                            <div class="row">
                                <!-- first -->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Nombre del centro</th>
                                                        <td>{{ $post->title }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <td>{{ $post->descripcion }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Regional</th>
                                                        <td>{{ $post->regional->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de creacion</th>
                                                        <td>{{ $post->created_at }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-twitter"> Editar </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end first-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--End card body-->
                    </div>
                    <!--End card-->
                </div>
            </div>
        </div>
    </div>
@endsection

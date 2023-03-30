<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('Sistema de Horario') }}
        </a>
    </div>
    @if(Auth::user()->hasRole("admin"))
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">apps</i>
                    <p>{{ __('Inicio') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'Lugar' || $activePage == 'lugar' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravel" aria-expanded="true">
                    <i class="fa fa-users"></i>
                    <p>
                        RCSA<b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravel">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'regional' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('regional.index') }}">
                                <i class="material-icons">location_city</i>
                                <p>{{ __('Regional') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('posts.index') }}">
                                <i class="material-icons">apartment</i>
                                <p>{{ __('Centros') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'sede' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('sede.index') }}">
                                <i class="material-icons">domain</i>
                                <p>{{ __('Sede') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'ambiente' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('ambiente.index') }}">
                                <i class="material-icons">domain</i>
                                <p>{{ __('Ambiente') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i class="fa fa-users"></i>
                    <p>Usuarios
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'coordinador' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('coordinador.index') }}">
                                <i class="material-icons">building_user</i>
                                <span class="sidebar-normal">Coordinador</span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'instructor' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('instructor.index') }}">
                                <i class="material-icons">assignment_ind</i>
                                <span class="sidebar-normal">Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'aprendiz' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('aprendiz.index') }}">
                                <i class="material-icons">hail</i>
                                <span class="sidebar-normal">Aprendiz</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExampleee" aria-expanded="true">
                    <i class="fa fa-users"></i>
                    <p>Horarios
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExampleee">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'horarioevento' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('horarioevento.index') }}">
                                <i class="material-icons">building_user</i>
                                <span class="sidebar-normal">Horario extra</span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'Horario' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('horario.index') }}">
                                <i class="material-icons">calendar_month</i>
                                <p>{{ __('Horario') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'programa' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('programa.index') }}">
                    <i class="material-icons">bookmarks</i>
                    <p>{{ __('Programa') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'fichas' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('ficha.index') }}">
                    <i class="material-icons">numbers</i>
                    <p>{{ __('Fichas') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'asignarficha' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('asignarficha.index') }}">
                    <i class="material-icons">numbers</i>
                    <p>{{ __('Asignar ficha a usuario') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'malla' || $activePage == 'malla' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#malla" aria-expanded="true">
                    <i class="fa fa-users"></i>
                    <p>Malla
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="malla">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'mallas' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('malla.index') }}">
                                <i class="material-icons">domain</i>
                                <p>{{ __('Mallas') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'competencia' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('competencia.index') }}">
                                <i class="material-icons">domain</i>
                                <p>{{ __('Competencia') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'resultado' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('resultado.index') }}">
                                <i class="material-icons">domain</i>
                                <p>{{ __('Resultado') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    @endif
    @if (Auth::user()->hasRole("instructor"))
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">apps</i>
                    <p>{{ __('Inicio') }}</p>
                </a>
            </li>
        </ul>
    </div>
    @endif
    @if (Auth::user()->hasRole("coordinador"))
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">apps</i>
                    <p>{{ __('Inicio') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'ambiente' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('ambiente.index') }}">
                    <i class="material-icons">domain</i>
                    <p>{{ __('Ambiente') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'instructor' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('instructor.index') }}">
                    <i class="material-icons">assignment_ind</i>
                    <span class="sidebar-normal">Instructor</span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'fichas' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('ficha.index') }}">
                    <i class="material-icons">numbers</i>
                    <p>{{ __('Fichas') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'asignarficha' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('asignarficha.index') }}">
                    <i class="material-icons">numbers</i>
                    <p>{{ __('Asignar ficha a usuario') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExampleee" aria-expanded="true">
                    <i class="fa fa-users"></i>
                    <p>Horarios
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExampleee">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'horarioevento' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('horarioevento.index') }}">
                                <i class="material-icons">building_user</i>
                                <span class="sidebar-normal">Horario extra</span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'Horario' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('horario.index') }}">
                                <i class="material-icons">calendar_month</i>
                                <p>{{ __('Horario') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    @endif
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="perfect-scrollbar-on">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>{{ __('Sistema de Horario') }}</title>
  <!-- Rel Icon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo_sena.svg') }}">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
</head>

<body class="{{ $class ?? '' }}">
  @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  @include('layouts.page_templates.auth')
  @endauth

  @guest()
    @include('layouts.page_templates.guest')

  @endguest
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
  <script src="{{ asset('DataTables/datatables.js') }}"></script>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Script Modal -->
  <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
  </script>
  <!-- Script Modal -->
  <script>
    (() => {
        'use strict'
      const forms = document.querySelectorAll('.needs-validation')

      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
  @yield('script')
  @stack('js')
</body>
</html>

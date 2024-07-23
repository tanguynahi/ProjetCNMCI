<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Page de Connexion de la plateforme CNMCI.">
  <meta name="keyword" content="Page de Connexion de la page CNMCI">
  <link rel="icon" href="{{ asset('assets/home/cnmci.jpg') }}" type="image/x-icon"> <!-- Favicon-->
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('assets/home/css/luno-style.css') }}">
  <!-- Jquery Core Js -->
  <script src="{{ asset('assets/home/js/plugins.js') }}"></script>

 @stack('css')
</head>
<body id="layout-1" data-luno="theme-blue">
  <!-- start: body area -->
  <div class="wrapper">
    <!-- Sign In version 1 -->
    @include('partials.home_partials.header')
    <!-- start: page body -->
        @yield('content')
    @include('partials.home_partials.footer')
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
      $(function() {
        $('#password').password()
      })
    </script>
  </div>

  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="{{ asset('assets/home/js/theme.js') }}"></script>
  <!-- Plugin Js -->
  <!-- Vendor Script -->

  @stack('js')

</body>

</html>

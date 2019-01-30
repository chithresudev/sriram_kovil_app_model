<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Medium Blog Application') }}</title>

  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
  <link href="{{ asset('css/material-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/segmented-controls.css') }}" rel="stylesheet">
  @stack('styles')
</head>

<body>

   <!-- Header section -->

   @if (Route::currentRouteName()!='login-form')
     <header class="bg-white">
     @include('shared.navbar')
     </header>
   @endif

   <!-- Sidebar section-->

  @if (session()->has('district'))
  <div id="mysidebar">
   @yield('sidebar')
   @endif
 </div>

   <!-- Main section -->

  <main>
    @yield('content')
    
  </main>

  <!-- Footer section -->
  <footer>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('js/feather.min.js') }}" ></script>
  <script src="{{ asset('js/app.js') }}" ></script>
  @stack('scripts')
</body>
</html>

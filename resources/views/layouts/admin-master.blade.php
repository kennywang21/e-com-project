<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin area</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">


    @yield('styles')

  </head>
  <body>
    @include('includes._admin-header')
    @yield('content')

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script>
      var baseUrl = "{{ URL::to('/') }}";
    </script>
    <script
      src="http://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    @yield('jquery')
  </body>
</html>

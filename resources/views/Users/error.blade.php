<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/error.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/icon.png') }}">

  </head>

  <body>

    <div class="container-fluid errorContent h-100">
        <div class="row h-100">
            <div class="col h-100">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

  </body>

</html>

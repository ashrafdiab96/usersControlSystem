{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/register.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/icon.png') }}">
  </head>

  <body> --}}

    @extends('../Users.layout')

    @section('title', 'profile')

@section('content')

        <div class="container h-100 d-flex justify-content-center">
            <div class="row h-100 w-50">
                <div class="col h-100">
                    <form class="h-100 myForm d-flex justify-content-center align-items-center" method="POST" action="{{ url('/operations/store') }}">
                        @csrf
                        <div class="container card form-container p-5">
                            <div class="row mb-5">
                                <div class="col text-center">
                                    <h3 class="text-white">Create Operation</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="op" placeholder="operation">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="type" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="tech" placeholder="technology">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group text-center mt-3">
                                        <button type="submit" class="btn px-4">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection

        {{-- <!-- Bootstrap JS -->
        <script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

  </body>

</html> --}}

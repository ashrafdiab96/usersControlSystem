<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/myStyle.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/icon.png') }}">
  </head>

  <body>

    <div class="top-line"></div>

    <nav class="navbar navbar-expand-sm navbar-light bg-transperent">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">DASHBOARD</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown mr-5">
                    <a role="button" type="button" class="nav-link" data-toggle="dropdown">
                        <img class="rounded-circle" src="{{ asset('/assets/images/hi.png') }}">
                    </a>
                    <div class="dropdown-menu profile-menu" aria-labelledby="dropdownId">
                        <h5 class="dropdown-item">Welcome {{ Auth::user()->fname }}</h5>
                    </div>
                </li>
                <li class="nav-item dropdown mr-5">
                    <a role="button" type="button" class="nav-link" data-toggle="dropdown">
                        <img class="rounded-circle" src="{{ asset('/assets/images/user-profile.jpg') }}">
                    </a>
                    <div class="dropdown-menu profile-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ url('/users/show', Auth::user()->id) }}">Profile</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ url('/users/deleteAcc', Auth::user()->id) }}" onclick="return confirm('Are you sure you want to delete your account ?')">Delete Account</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid side">
        <div class="row m-2">
            <div class="col-md-3 side-nav">
                <div class="text-center">
                    <h4 class="caption my-3">USERS CONTROL</h4>
                </div>
                <div class="line"></div>
                <div class="nav-item m-3">
                    <i class="fas fa-home"></i>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </div>
                @if(Auth::user()->role == 'owner' || Auth::user()->role == 'it' || Auth::user()->role == 'operation')
                    <div class="nav-item m-3">
                        <i class="fab fa-wpbeginner"></i>
                        <a href="{{ url('/operations/show') }}">Operations</a>
                    </div>
                @endif
                @if(Auth::user()->role == 'owner' || Auth::user()->role == 'it' || Auth::user()->role == 'finance')
                    <div class="nav-item m-3">
                        <i class="fas fa-hand-holding-usd"></i>
                        <a href="{{ url('/finance/show') }}">Finance</a>
                    </div>
                @endif
                @if (Auth::user()->role == 'owner' || Auth::user()->role == 'it')
                    <div class="nav-item m-3">
                        <i class="fas fa-users"></i>
                        <a href="{{ url('/users/showAll') }}">Users</a>
                    </div>
                @endif
                <div class="text-center">
                    <h4 class="caption my-3">CONTACTS</h4>
                </div>
                <div class="line"></div>

                <div class="contacts m-3">
                    <div class="address">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Nasr City, Cairo, Egypt</span>
                    </div>
                    <div class="phone">
                        <i class="fas fa-phone"></i>
                        <span>002 01020869595</span>
                    </div>
                    <div class="facebook">
                        <i class="fab fa-facebook-square"></i>
                        <a href="https://www.facebook.com/ashraf.diab.10" target="_blank">Facebook</a>
                    </div>
                    <div class="linkedin">
                        <i class="fab fa-linkedin"></i>
                        <a href="https://www.linkedin.com/in/ashraf-diab-b1120b159/" target="_blank">Linkedin</a>
                    </div>
                    <div class="twitter">
                        <i class="fab fa-twitter-square"></i>
                        <a href="https://twitter.com/ashrafdiab6" target="_blank">Twitter</a>
                    </div>
                    <div class="instgram">
                        <i class="fab fa-instagram"></i>
                        <a href="https://www.instagram.com/ashraf_diab96/?hl=en" target="_blank">Instgram</a>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                @yield('content')
            </div>

        </div>
    </div>


      <!-- Bootstrap JS -->
    <script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- Script JS -->
    <script src="{{ asset('/assets/js/mine.js') }}"></script>

  </body>

</html>


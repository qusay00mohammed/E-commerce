<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'unknown')</title>

    <!-- Bootstrap v3.4 css File -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Fontawesome v4.7 Library Icon css -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- select boxit plugin -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.selectBoxIt.css') }}">
    <!-- My Custom css File -->
    <link rel="stylesheet" href="{{ asset('css/master_website.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @php
        // use Auth;
        // use Cache;
        $user = Auth::user();
    @endphp

    @section('upperBar')
        <div class="upper-bar">
            <div class="container">
                @auth
                <div class="btn-group my-info">
                    <img class="img-circle img-thumbnail" src="{{ $user->photo ? asset('images/photo_user/' . $user->photo->name_photo) : asset('images/afatar.png') }}" alt="">
                    <span class="dropdown-toggle" data-toggle="dropdown">
                        <i>{{ $user->username }}</i>
                        <span class="caret"></span>
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}">My Profile</a></li>
                        <li><a href="{{ route('newItem') }}">New Item</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}"><span class="pull-right">Login/Signup</span></a>
                @endauth
            </div>
        </div>
    @show



    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">HOME</a>
            </div>

            <?php
                use App\Categorie;
                $categories = Categorie::select('*')->where('parent', 0)->get();
            ?>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @foreach ($categories as $cat)
                    <li><a href="{{ route('category', ['id'=>$cat->id]) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>




    @yield('content')




    <!-- jQuery file -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Bootstrap v3.4 js file -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- select boxit plugin -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.selectBoxIt.min.js') }}"></script>
    <!-- My Custom js file -->
    <script src="{{ asset('js/myjs_website.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>@yield("title","Главная")</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
{{--    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">--}}

{{--    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

</head>
<body>

<script>

    $(document).on("click","ul.activize li", function () {
        // console.log(window.sessionStorage);
        $("ul.activize li.active").removeClass("active");
        $(this).addClass("active");
        sessionStorage.setItem('LastActive', $(this).index())

    });

    $(document).onh


</script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav activize">
                <li class="active"><a href="/">Главная <span class="sr-only">(current)</span></a></li>
                <li>
                    <a href="{{ route("weather") }}">Погода на сегодня</a></li>

                @auth
                       <li><a href="{{ route('feedbacks') }}">Все отзывы</a></li>
                    <li><a href="{{ route('new_feedback') }}">Оставить отзыв</a></li>
                @endauth
                <script>

                    var ele = sessionStorage.getItem('LastActive');
                    if (ele){
                        $("ul.activize li.active").removeClass("active");
                        $('ul.activize li:eq(' + ele + ')').addClass('active');
                    }


                </script>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">



<!--                        --><?php //if(isset($data["user"])){ print("Your login: ".$data["user"]["email"]);}
//                        else{ echo '<li><a href="/login.php">Вход</a></li>';}
//                        ?>
                    </a></li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="/exit.php">--}}
<!--                        --><?php //if(isset($data["user"])){ print("Выход");} ?>
                    {{--</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

<main>
    {{--<div class="row">--}}

        @yield("content")
<!--        --><?php //include "weather/views/".$this->content; ?>
    {{--</div>--}}
</main>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../static/jquery/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../static/js/bootstrap.min.js"></script>
</body>
</html>
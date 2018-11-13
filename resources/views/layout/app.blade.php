<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/print.css')}}">
    <link rel="icon" href="{{asset('img/shulemall.png')}}">

    <style>
        body{
            /*background: url({{asset("img/bg_3.jpg")}} );*/
            background-color: #fbfbfb;
        }
    </style>

    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/semantic.min.js')}}"></script>
</head>
<body>

<div class="ui stackable huge  menu top fixed">
    <div class=" item" style="font-size: 120%">
        <img src="{{asset('img/shulemall.png')}}" alt="Abiri" class="">&nbsp;&nbsp;&nbsp;{{config('app.name')}}
    </div>
    @if(Auth::check())
        {{--api menu links--}}
        <a class=" item" href="
        @if (Auth::user()->user_type == "admin")
        {{route('super.dashboard')}}
        @endif
        "><i class="home icon"></i>Home</a>
        <div class="right menu">
            <a href="{{route('logout')}}" class="item">
                <i class="user icon"></i>My Account <i class="caret down icon"></i>
            </a>
        </div>
    @else
        <div class="right menu">
            <a href="{{route('index')}}" class="item"><i class="sign in icon"></i>Login</a>
        </div>
    @endif
</div>
<div class="ui container" style="margin-top: 8rem;">
    @yield('body')
</div>
<script type="text/javascript">
    $('.ui.select.dropdown')
        .dropdown()
    ;
</script>
</body>
</html>
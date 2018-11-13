<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/print.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/calendar.min.css')}}">
    <link rel="icon" href="{{asset('image/plate.png')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <style>
        body.pushable > .pusher {
            background-color: #fafafa;
            /*background-image: url({{asset("img/bg_1.jpg")}});
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;*/
        }
    </style>

    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/semantic.min.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/calendar.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/pdfmake.min.js')}}"></script>
</head>
<body class="pushable">
<div class="ui inverted vertical sidebar menu left" style="" id="dontPrintMe">
    <a href="" class="disabled item">
        <img src="{{asset('image/plate.png')}}" alt="ShuleMall" class="">
        <h3 style="color: #cccccc">
            @if(Auth::check())
                {{Auth::user()->fName ." ". Auth::user()->sName}}
            @endif
        </h3>
    </a>
    <a class="item" href="@admin {{url('/super')}} @endadmin  @cashier {{route('home')}} @endcashier">
        <i class="home icon"></i>
        Home
    </a>
    <div class="item">
        <div class="header">Manage</div>
        <div class="menu">
            <a href="#" class="item">
                <i class="utensils icon"></i>
                Meal(s)
            </a>
            <a href="#" class="item">
                <i class="shopping bag icon"></i>
                Order(s)
            </a>
        </div>
    </div>
    <a class="item">
        <i class="sign out icon"></i>
        Sign Out
    </a>
</div>

<div class="pusher" onclick="act_stop()">
    <div class="ui top attached stackable menu" id="dontPrintMe">
        <a class="item" onclick="act()">
            <i class="sidebar icon"></i>
            Menu
        </a>
        <div class=" item" style="font-size: 120%">
            <img src="{{asset('image/plate.png')}}" alt="{{config('app.name')}}" class="">&nbsp;&nbsp;&nbsp;{{config('app.name')}}
        </div>
        @if(Auth::check())
            {{--api menu links--}}
            <a class=" item" href="@admin {{url('/super')}} @endadmin  @cashier {{route('home')}} @endcashier"><i class="home icon"></i>Home</a>
            <div class="right menu">
                @cashier
                <a href="#" onclick="openModalOrders();" class="item">
                    <i class="utensils icon"></i>
                    Saved Orders
                    <label class="ui circular red label">
                        {{count(\App\Cart::where('user_id',Auth::user()->id)->get())}}
                    </label>
                </a>
                @endcashier
                <a class="item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="sign out icon"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <div class="right menu">
                <a href="{{route('index')}}" class="item"><i class="sign in icon"></i>Login</a>
            </div>
        @endif
    </div>
    <div class="ui horizontal divider header container" style="margin-top: 1rem" id="dontPrintMe">
        <i class="dashboard icon"></i>
        @yield('header')
    </div>
    <div class="ui buttom attached container">
        @yield('body')
    </div>
</div>

<script type="text/javascript">
    /*beautiful dropdown UI*/
    $('.ui.select.dropdown')
        .dropdown()
    ;
    /*show hide sidebar*/
    function act() {
        $('.ui.sidebar')
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('toggle')
        ;
    }
    function act_stop() {
        $('.ui.sidebar')
            .sidebar('hide')
        ;
    }
    $('#example1')
        .calendar({
            ampm:false,
            formatter: {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = date.getDate() + '';
                    if (day.length < 2) {
                        day = '0' + day;
                    }
                    var month = (date.getMonth() + 1) + '';
                    if (month.length < 2) {
                        month = '0' + month;
                    }
                    var year = date.getFullYear();
                    return year + '-' + month + '-' + day;
                }
            }
        });
    function _print() {
        window.print();
    }

    $(document).ready( function () {
        $('#myTable').DataTable({
            order:[0,'desc'],
            dom: 'Bfrtip',
            buttons: [
                'print'
            ],
        });
    });
</script>

</body>
</html>
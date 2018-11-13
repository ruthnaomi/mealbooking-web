@extends('layout.dashboard')

@section('title','Super Administrator')

@section('header','Super Administrator Dashboard')

@section('body')
    <div class="ui stackable segments">
        <div class="ui header blue inverted segment">
            <i class="linkify icon"></i>
            Manage Account(s)
        </div>
        <div class="ui horizontal segments" style="background: #fff">
            <div class="ui segment">
                <a href="{{route('register.create')}}" style="font-size: 18px">
                    <i class="user plus big icon"></i>
                    Create Account(s)
                </a>
            </div>
            <div class="ui segment">
                <a href="{{route('register.index')}}" style="font-size: 18px">
                    <i class="users big icon"></i>
                    Registered Account(s)
                </a>
            </div>
        </div>
    </div>
    {{--<div class="ui header">
        <i class="ellipsis vertical icon"></i>
        More options
    </div>
    <div class="ui stackable equal width grid">
        <div class="row">
            <div class="column">
                <div class="ui segments">
                    <div class="ui blue inverted segment">
                        <i class="user plus icon"></i>
                        Manage Registrations
                    </div>
                    <div class="ui segment">
                        <a href="{{route('register.index')}}" class="">Management Account Registration</a>
                    </div>
                    <div class="ui segment">
                        <a href="{{route('passenger.index')}}" class="">Passenger Registration</a>
                    </div>
                    <div class="ui segment">
                        <a href="" class="">Blank</a>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="ui segments">
                    <div class="ui blue inverted segment">
                        <i class="bus icon"></i>
                        Manage Vehicle, Routes & Trips
                    </div>
                    <div class="ui segment">
                        <a href="{{route('vehicle.index')}}" class="">Manage Vehicles</a>
                    </div>
                    <div class="ui segment">
                        <a href="{{route('route.index')}}" class="">Manage Routes</a>
                    </div>
                    <div class="ui segment">
                        <a href="{{route('trip.index')}}" class="">Manage Trips</a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui segments">
                    <div class="ui blue inverted segment">
                        <i class="book icon"></i>
                        Reports
                    </div>
                    <div class="ui segment">
                        <a href="" class="">Vehicles Reports</a>
                    </div>
                    <div class="ui segment">
                        <a href="" class="">Trips Reports</a>
                    </div>
                    <div class="ui segment">
                        <a href="" class="">Passenger Reports</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="ui  header">
            <i class="large icons">
                <i class="money icon"></i>
                <i class="corner area chart icon"></i>
            </i>
            Profit (within the last 6 days).
        </div>
        <div class="row">
            <div class="column">
                <div class="ui segment">
                    <canvas id="myChart" width="100%" height="30px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br>--}}
    {{--<script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6"],
                datasets: [{
                    label: 'Profit margin within 6 days',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>--}}
@endsection
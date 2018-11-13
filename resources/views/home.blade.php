@extends('layout.dashboard')

@section('title','Cashier - Backend')

@section('header','Cashier Dashboard')

@section('body')
    <div class="ui equal width column grid stackable">
        <div class="column">
            <a href="{{route('bookings.index')}}">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="shopping bag red icon"></i>
                        <i class="corner utensils red icon"></i>
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Order(s)
                </div>
            </a>
        </div>
        <div class="column">
            <a href="{{route('meals.index')}}">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="shopping utensils red icon"></i>
                  
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Meal(s)
                </div>
            </a>
        </div>
        <div class="column">
            <a href="{{route('reports.index')}}">
                <div class="ui segment" style="text-align: center; font-size: 18px; padding: 3rem">
                    <i class="huge icons">
                        <i class="clipboard red icon"></i>
                    </i>
                    <div style="margin: 1rem"></div>
                    Manage Report(s)
                </div>
            </a>
        </div>
    </div>
@endsection
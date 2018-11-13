@extends('layout.dashboard')

@section('title','Booking(s) List')

@section('header','Cashier Dashboard')

@section('body')
    @include('shared.errors')
    @include('shared.messages')
    <table class="ui large red table" id="myTable">
        <thead>
        <tr>
            <th>Image:</th>
            <th>Booking No:</th>
            <th>Customer Name:</th>
            <th>Status:</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(count($meals) > 0)
            @foreach($meals as $meal)
                <tr>
                    <td>
                        <img src="{{asset('image/avater.png')}}" alt="{{$meal->image}}" class="ui avatar image"> {{-- TODO: remove public/* during live site --}}
                    </td>
                    <td>{{$meal->id}}</td>
                    <td>{{$meal->user->fName ." ". $meal->user->sName }}</td>
                    <td>
                        @if($meal->status == 0)
                            <label for="" class="ui label">Pending to be served...</label>
                        @else
                            <label for="" class="ui blue label">Served!</label>
                        @endif
                    </td>
                    <td>

                        <div class="ui small buttons">
                            <a href="{{route('bookings.show',$meal->id)}}" class="ui button"><i class="utensils icon"></i></a>
                            <div class="or"></div>
                            <a href="{{route('print.show',$meal->id)}}" class="ui positive button"><i class="print icon"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold">
                    <img src="{{asset('image/dish.png')}}" alt="{{config('app.name')}}" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking(s) done yet!</div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
@extends('layout.dashboard')

@section('title','Daily Food Ordered Report(s) List')

@section('header','Daily Food Ordered Report List')

@section('body')
    @include('shared.errors')
    @include('shared.messages')
    <table class="ui large red table" id="myTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Image:</th>
            <th>Meal Name:</th>
            <th>Qty Served:</th>
        </tr>
        </thead>
        <tbody>
        @if(count($meals) > 0)
            @foreach($meals as $meal)
                <tr>
                    <td>{{$meal->id}}</td>
                    <td>
                        <img src="{{asset('image/meals/'.$meal->image)}}" alt="{{$meal->image}}" class="ui avatar image"> {{-- TODO: remove public/* during live site --}}
                    </td>
                    <td>{{$meal->name}}</td>
                    <td>{{number_format(\App\BookingDetail::where('meal_id',$meal->id)->get()->count())}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" style="text-align: center;font-weight: bold">
                    <img src="{{asset('image/dish.png')}}" alt="{{config('app.name')}}" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Food report list(s) done yet!</div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
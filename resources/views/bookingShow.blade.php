@extends('layout.dashboard')

@section('title','Booking(s) List')

@section('header','Cashier Dashboard')

@section('body')
    @include('shared.errors')
    @include('shared.messages')
	<a href="{{route('bookings.index')}}" class="ui large button">
		<i class="caret left icon"></i>
		Go Back - Booking(s) List
	</a>
    <table class="ui large red table">
        <thead>
        <tr>
            <th colspan="4">
                <table class="ui red inverted table">
                    <thead>
                    <tr>
                        <th>Booking For:</th>
                        <th>{{$meals->user->fName." ".$meals->user->sName}}</th>
                    </tr>
                    <tr>
                        <th>Booking No:</th>
                        <th>{{$meals->id}}</th>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <th>
                            @if($meals->status == 0)
                                <label for="" class="ui label">Pending to be served...</label>
                            @else
                                <label for="" class="ui blue label">Served!</label>
                            @endif
                        </th>
                    </tr>
                    </thead>
                </table>
            </th>
        </tr>
        <tr>
            <th>Image:</th>
            <th>Dish Name:</th>
            <th>Booked Qty:</th>
            <th>Booked At:</th>
            {{--<th></th>--}}
        </tr>
        </thead>
        <tbody>
        @if(count($meals) > 0)
            @foreach($meals->bookingDetails as $meal)
                <tr>
                    <td>
                        <img src="{{asset('image/avater.png')}}" alt="" class="ui avatar image"> {{-- TODO: remove public/* during live site --}}
                    </td>
                    <td>{{$meal->name }}</td>
                    <td>{{$meal->qty }}</td>
                    <td>{{$meal->created_at }}</td>
                    {{--<td>
                        <a href="{{route('bookings.show',$meal->id)}}" class=""><i class="utensils large red icon"></i></a>
                        <a href="#" class=""><i class="print large red icon"></i></a>
                    </td>--}}
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold">
                    <img src="{{asset('image/dish.png')}}" alt="{{config('app.name')}}" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking meal(s) found yet!</div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
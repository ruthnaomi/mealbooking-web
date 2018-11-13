@extends('layout.dashboard')

@section('title','Booking(s) List')

@section('header','Cashier Dashboard')

@section('body')

    @php
    $print=0;
        if (isset($_GET["submit"]))
        {
            $print=1;
            \App\Booking::where('id',$meals->id)->update([
                'status'=>1
            ]);
            echo "<script>window.print();</script>";
        }
    @endphp
    @if($print==0)
        <form id="dontPrintMe" action="" method="get">
            <button class="ui blue button" name="submit">Submit and Print</button>
        </form>
    @else
        <a href="{{route('bookings.index')}}" class="ui red button" id="dontPrintMe">Go Back to Booking Orders</a>
    @endif

    <table class="ui large red table">
        <thead>
        <tr>
            <th colspan="4" style="text-align: center">
                <h3>{{config('app.name')}}</h3>
                <p>Meal Booking Receipt</p>
                @if($meals->user->role == "cashier")
                    <p>Cashier: {{$meals->user->fName . " " . $meals->user->sName}}</p>
                    <p>Order No: {{$meals->id}}</p>
                @else
                    <p>Customer: {{$meals->user->fName . " " . $meals->user->sName}}</p>
                    <p>Booking No: {{$meals->id}}</p>
                @endif
                <p>{{$meals->created_at}}</p>
            </th>
        </tr>
        <tr>
            <th>Dish Name:</th>
            <th>Booked Qty:</th>
            <th>Net Price:</th>
            <th>Gross Price:</th>
        </tr>
        </thead>
        <tbody>
        @php $total=0; @endphp
        @if(count($meals) > 0)
            @foreach($meals->bookingDetails as $meal)
                <tr>
                    <td>{{$meal->name }}</td>
                    <td>{{$meal->qty }}</td>
                    <td style="text-align: left">Ksh.{{number_format($meal->net_price) }}.00 KES</td>
                    <td style="text-align: left">Ksh.{{number_format($meal->gross_price) }}.00 KES</td>
                </tr>
                @php $total += $meal->gross_price; @endphp
            @endforeach
        @else
            <tr>
                <td colspan="4" style="text-align: center;font-weight: bold">
                    <img src="{{asset('image/dish.png')}}" alt="{{config('app.name')}}" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No Booking meal(s) found yet!</div>
                </td>
            </tr>
        @endif
        <tr>
            <td colspan="3" style="text-align: right;font-weight: bold">Grand Total:</td>
            <td style="text-align: left;font-weight: bold">Ksh.{{number_format($total)}}.00 KES</td>
        </tr>
        @if($meals->user->role == "cashier")
            <tr>
                <td colspan="3" style="text-align: right;font-weight: bold">Cash Paid:</td>
                <td style="text-align: left;font-weight: bold">Ksh. {{number_format($meals->payment)}}.00 KES</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;font-weight: bold">Change:</td>
                <td style="text-align: left;font-weight: bold">Ksh.{{number_format($meals->customer_change)}}.00 KES</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
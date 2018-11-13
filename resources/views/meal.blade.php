@extends('layout.dashboard')

@section('title','Meal(s) List')

@section('header','Cashier Dashboard')

@section('body')
    @include('shared.errors')
    @include('shared.messages')
    <table class="ui large table" id="myTable">
        <thead>
        <tr>
            <th colspan="7">
                <a href="{{route('home')}}" class="ui large button">
                    <i class="caret left icon"></i>
                    Go Back - Home
                </a>
                <!--<a href="{{route('meals.create')}}" class="ui large red button">
                    <i class="utensils icon"></i>
                    Add New Meal(s)
                </a>-->
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Image:</th>
            <th>Dish Name:</th>
            <th>Price:</th>
            <th>Qty:</th>
            <th></th>
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
                    <td>Ksh.{{number_format($meal->price)}}/=</td>
                    <td>Dish Rem. for: <b>{{$meal->qty}}</b> People</td>
                    <td>
                        <form id="form{{$meal->id}}" action="{{route('meals.destroy',['id'=>$meal->id])}}" method="post">
                            <a href="#" onclick="openModal{{$meal->id}}()" id=""><i class="cart plus large icon"></i></a>
                            <a href="{{route('meals.edit',['id'=>$meal->id])}}"><i class="edit large icon"></i></a>
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <a href="#" onclick="function submit() {
                                        document.getElementById('form{{$meal->id}}').submit();
                                    }
                                    submit()">
                                <i class="trash large icon"></i>
                            </a>
                        </form>
                        {{--Modal For Order Form--}}
                        <div class="ui modal example{{$meal->id}}">
                            <i class="close icon"></i>
                            <div class="header">
                                Meal Details
                            </div>
                            <div class="image content">
                                <div class="ui medium image">
                                    <img src="{{asset('image/meals/'.$meal->image)}}" class="middle image">
                                </div>
                                <div class="description">
                                    <div class="ui header">{{$meal->name}}</div>
                                    <p>Price: Ksh.{{number_format($meal->price)}}/=</p>
                                    <p>Qty&nbsp;&nbsp;: Dish Rem. for: <b>{{$meal->qty}}</b> People</p>
                                    <form id="orderForm" action="{{route('cart.store')}}" method="post" class="ui large form">
                                        @csrf
                                        <input type="hidden" name="meal_id" value="{{$meal->id}}">
                                        <input type="hidden" name="qty" value="{{$meal->qty}}">
                                        <input type="hidden" name="price" value="{{$meal->price}}">
                                        <div class="field required">
                                            <label for="qty">Qty Ordered</label>
                                            <div class="ui left input icon">
                                                <input required type="number" id="qty" name="qty" min="1" value="1" placeholder="Qty Ordered...">
                                                <i class="utensils icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="actions">
                                <div class="ui black deny button">
                                    Cancel
                                </div>
                                <button type="submit" onclick="document.getElementById('orderForm').submit();" class="ui positive right labeled icon button">
                                    Add to Orders
                                    <i class="cart plus icon"></i>
                                </button>
                            </div>
                        </div>
                        {{--script for models--}}
                        <script>
                            function openModal{{$meal->id}}() {
                                $('.ui.modal.example{{$meal->id}}')
                                    .modal('show')
                                ;
                            }
                        </script>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" style="text-align: center;font-weight: bold">
                    <img src="{{asset('image/dish.png')}}" alt="{{config('app.name')}}" class="ui tiny centered image">
                    <div style="margin: 5px 5px 5px 5px">No meal(s) added yet!</div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    {{--modal orders--}}
    <div class="ui fullscreen modal orders">
        <i class="close icon"></i>
        <div class="header">
            Customer Orders
        </div>
        <div class="content">
            <table class="ui table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Meal</th>
                    <th>Qty Ordered</th>
                    <th>Net Price</th>
                    <th>Gross Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            <img src="{{asset('image/meals/'.$order->meal->image)}}" alt="{{$order->meal->image}}" class="ui avatar image"> {{-- TODO: remove public/* during live site --}}
                        </td>
                        <td>{{$order->meal->name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->net_price}}</td>
                        <td>{{$order->gross_price}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5" style="text-align: right;font-weight:bold;">Grand Total:</th>
                    <th style="font-weight:bold;">Ksh. {{number_format($orders->sum('gross_price'))}}.00 KES</th>
                </tr>
                </tfoot>
            </table>
            <form class="ui big form" method="post" id="paymentForm" action="{{route('payment.store')}}">
                @csrf
                <input type="number" hidden id="grand_total" value="{{$orders->sum('gross_price')}}">
                <input type="number" hidden name="user_id" value="{{Auth::user()->id}}">
                <div class="field required">
                    <label for="cash">Cash</label>
                    <input type="number" id="cash" name="payment" placeholder="Enter Cash Here...">
                </div>
                <div class="field">
                    <label for="change">Change</label>
                    <input type="text" id="change" name="change" readonly>
                </div>
            </form>
        </div>
        <div class="actions">
            <div class="ui black deny button">
                Cancel
            </div>
            <button type="submit" onclick="const cash=document.getElementById('cash').value; if (cash === null || cash === ''){alert('Cash Field Required'); e.preventDefault();}else{document.getElementById('paymentForm').submit();}" class="ui positive right labeled icon button">
                Checkout & Print
                <i class="checkmark icon"></i>
            </button>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $("#cash").on('keyup',function () {
                $("#change").val($(this).val() - $("#grand_total").val());
            });
        });
        function openModalOrders() {
            $('.fullscreen.modal.orders')
                .modal('show')
            ;
        }
    </script>
@endsection
@extends('layout.dashboard')

@section('title','Register Users - New Accounts')

@section('header','Super Administrator Dashboard')

@section('body')
    <div class="ui stackable grid">
        <div class="row">
            <div class="three wide column"></div>
            <div class="ten wide column">
                <div class="ui segments">
                    <div class="ui inverted blue segment">
                        <a href="{{route('register.index')}}" class="ui button"><i class="caret left icon"></i> Go Back</a>
                        <i class="user icon"></i>{{ucwords(substr(Route::currentRouteName(),9))}} Account
                    </div>
                    <div class="ui segment">
                        @include('shared.errors')
                        <form action="{{route('register.store')}}@yield('id')" class="ui big form" method="post">
                            {{csrf_field()}}
                            @section('method')
                            @show
                            <div class="two fields">
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="text" name="fName" placeholder="First Name" value="@yield('fName'){{old('fName')}}" autofocus>
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="text" name="sName" placeholder="Second Name" value="@yield('sName'){{old('sName')}}" autofocus>
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="email" placeholder="Email" value="@yield('email'){{old('email')}}">
                                    <i class="mail icon"></i>
                                </div>
                            </div>
                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="phone" placeholder="Mobile No" value="@yield('phone'){{old('phone')}}">
                                    <i class="call icon"></i>
                                </div>
                            </div>
                            <div class="field required">
                                <div class="ui left icon input">
                                    <input type="text" name="username" placeholder="Username" value="@yield('username'){{old('username')}}">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>
                                <div class="field required">
                                    <div class="ui left icon input">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{old('password')}}">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <select name="role" id="user" class="ui select dropdown">
                                    <option value="">Choose Role:</option>
                                    <option value="admin">Admin</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="student">Student</option>
                                    <option value="chef">Chef</option>
                                </select>
                            </div>
                            <div class="field">
                                <button type="submit" class="ui big blue  button">{{ucwords(substr(Route::currentRouteName(),9))}} Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="three wide column"></div>
        </div>
    </div>
@endsection
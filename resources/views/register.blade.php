@extends('layout.dashboard')

@section('title','Management Account Registration')

@section('header','Super Administrator Dashboard')

@section('body')
    @include('shared.errors')
    <table class="ui large table">
        <thead>
        <tr>
            <th colspan="6">
                <a href="{{route('super')}}" class="ui large button">
                    <i class="caret left icon"></i>
                    Go Back - Home
                </a>
                <a href="{{route('register.create')}}" class="ui large blue button">
                    <i class="user plus icon"></i>
                    Add New Account
                </a>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Name:</th>
            <th>Email:</th>
            <th>Phone:</th>
            <th>Role:</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$user->fName ." ". $user->sName}}</td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <form id="form{{$user->id}}" action="{{route('register.destroy',['register'=>$user->id])}}" method="post">
                            <a href="{{route('register.edit',['register'=>$user->id])}}"><i class="edit large icon"></i></a>
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <a href="#" onclick="function submit() {
                                        document.getElementById('form{{$user->id}}').submit();
                                    }
                                    submit()">
                                <i class="trash large icon"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No account(s) record found!</td>
            </tr>
        @endif
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.semantic-ui') }}
@endsection
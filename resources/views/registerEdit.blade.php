@extends('registerAdd')

@section('id','/'.$user->id)

@section('fName',$user->fName)

@section('sName',$user->sName)

@section('email',$user->email)

@section('phone',$user->phone)

@section('username',$user->username)

@section('method')
    {{ method_field('PUT') }}
@endsection

@extends("layouts.master")

@section('title')
    Blog Home
@endsection

@section('headh1')
    Home Hello,{{session('user')}}
@endsection

@section('headh3')
    This is the Home page of the blog
@endsection

@section('content')
    <a href="http://localhost:8000/about">About</a>
    @if(session()->has('user'))
        <a href="http://localhost:8000/logout">Logout</a>
    @else
        <a href="http://localhost:8000/login">Login</a>
    @endif
@endsection

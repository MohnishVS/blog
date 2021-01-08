@extends('layouts.master')

@section('title')
    Login Page
@endsection

@section('content')

<div class="card-body rounded pt-4 my-4 border bg-primary text-white">
    <div class="card col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-left form pt-4 my-4 bg-dark text-white">
        <h2 class="display-4">Login</h2>
        <div class="form-group">
            <form action="user" method="post">
                @csrf
                <div class="form-group">
                    <label for="Username">Username:</label><br />
                    <input type="text" name="username" id="username" autocomplete="username" class="form-control" required minlength=4 maxlength=8 placeholder="username"><br />
                    <div id="message1"></div>
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label><br />
                    <input type="password" name="password" class="form-control" id="password" required minlength=4 maxlength=8 placeholder="********"><br />
                </div>
                <div class="form-group">
                    <button type="submit" id="loginbtn" class="btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title')
    Register Page
@endsection

@section('content')
<div class="card-body rounded pt-4 my-4 border bg-primary text-white">
    <div class="card col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-left form pt-4 my-4 bg-dark text-white">
        <h2 class="display-4">Register</h2>
        <div class="form-group">
            <form action="api/registerus" method="post">
                @csrf
                <div class="form-group">
                    <label for="Username">Username:</label><br />
                    <input type="text" name="username" id="username" autocomplete="username" class="form-control" required minlength=4 maxlength=8 placeholder="username"><br />

                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br />
                    <input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required placeholder="Email"><br />

                </div>
                <div class="form-group">
                    <label for="Password">Password:</label><br />
                    <input type="password" name="password" class="form-control" id="password" required minlength=4 maxlength=8 placeholder="********"><br />
                </div>
                <div class="form-group">
                    <label for="Colour">Favourite Colour:</label><br />
                    <input type="Text" name="Colour" class="form-control" id="Colour" required ><br />

                </div>
                <button type="submit" id="registerbtn" class="btn btn-info">Register</button>
                <button onclick='location.href="/login"' id="createbtn" class="btn btn-info">Login Page</button>
            </form>


        </div>
    </div>
</div>
@endsection

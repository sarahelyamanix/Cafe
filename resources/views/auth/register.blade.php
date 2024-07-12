@extends('layouts.app')
@include('dash_includes.headDash')
@section('content')
<!DOCTYPE html>
<html lang="en">

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>

    <div class="login_wrapper">
            <section class="login_content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               placeholder="Fullname" required value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                               placeholder="Username" required value="{{ old('username') }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               placeholder="Email" required value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member?
                            <a href="{{ route('login') }}" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-graduation-cap"></i> Beverages Admin</h1>
                            <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>

@endsection

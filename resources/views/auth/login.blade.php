@extends('layouts.auth')

@section('content')
    <h2>Login</h2>
    <form id="loginForm">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <div class="register">
        <a href="{{ route('register') }}">Sign Up?</a>
    </div>
@endsection

@extends('layouts.auth')

@section('content')
    @if (session('error'))
        <div class="toast-message" id="toastMessage">
            {{ session('error') }}
        </div>
    @endif

    <h2>Register</h2>
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <div class="login">
        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>



@endsection

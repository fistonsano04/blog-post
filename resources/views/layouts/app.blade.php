<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header class="blog-header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <span><span class="highlight">B</span>log</span>
            </a>
        </div>
        <div class="title">
            <h2>Simple Blog Post</h2>
        </div>
        <div class="auth">
            @if (Auth::check())
                <p>Welcome, {{ Auth::user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </header>

    <div class="blog-container" id="blog-container">
        @yield('content')
    </div>
</body>

</html>

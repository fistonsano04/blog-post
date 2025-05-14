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
            @auth
                <div class="profile" style="display: flex; align-items: center; gap: 15px;">
                    <p style="margin: 0; font-weight: 600; color: #555; font-size: 1rem;">
                        Welcome, <a href="{{ route('dashboard') }}" style="color: #ffdd00;">{{ Auth::user()->name }}</a>
                    </p>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit"
                            style="background-color: #e4cc2f; color: white; border: none; padding: 8px 15px; border-radius: 20px; font-size: 0.9rem; font-weight: 500; cursor: pointer; transition: background-color 0.3s;">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="btn-auth">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endauth
        </div>
    </header>

    <div class="blog-container" id="blog-container">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<body>
    <div class="login-container">
        @yield('content')
    </div>
</body>

</html>

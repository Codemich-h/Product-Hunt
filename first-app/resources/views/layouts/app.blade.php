<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Codecourse</title>
</head>
<body>
    <div>
        @include('layouts.nav')
        @yield('content')
    </div>
</body>
</html>
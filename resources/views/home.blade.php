<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | Epoll</title>

    <script src="https://unpkg.com/htmx.org@1.9.8"></script>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
<div class="border-b-1 border-black">
    Hi! Your phone number is {{ auth()->user()->phone_number  }}}
</div>
</body>
</html>

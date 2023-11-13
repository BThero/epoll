<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Polls</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.8"></script>
</head>
<body class="antialiased">
<h1>Polls</h1>
@forelse ($polls as $poll)
    <p>This is poll {{ $poll->id }}</p>
@empty
    <p>No polls found</p>
@endforelse
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enter Phone Number</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.8"></script>
</head>
<body class="antialiased">
Enter the code sent to your phone
<form action="{{ route('register.verify') }}" method="post">
    @method('POST')
    @csrf
    <label>
        Code
        <input type="text" placeholder="abc123" name="code"/>
    </label>
    <button type="submit">Send</button>
</form>
</body>
</html>

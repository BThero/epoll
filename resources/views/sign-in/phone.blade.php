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
Enter your phone number
<form action="{{ route('signIn.savePhone') }}" method="post">
    @method('POST')
    @csrf
    <div>
        <label>
            Phone number
            <input type="text" placeholder="+34 ..." name="phone_number"/>
        </label>
    </div>
    @error('phone_number')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <button type="submit">Send</button>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enter Verification Code</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.8"></script>
</head>
<body class="antialiased">
<p>Enter the 4-digit code sent to your phone number {{ $phone_number }}</p>
<form action="{{ route('signIn.verifyPhone') }}" method="post">
    @method('POST')
    @csrf
    <div>
        <label hidden>
            Phone number
            <input type="text" hidden value="{{ $phone_number }}" name="phone_number"/>
        </label>
        <label>
            Code
            <input type="text" name="code" placeholder="1234"/>
        </label>
    </div>
    @error('code')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <button type="submit">Send</button>
</form>
</body>
</html>

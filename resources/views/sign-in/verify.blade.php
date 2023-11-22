<x-layout>
    <x-slot:title>
        Verify phone number
    </x-slot:title>
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
    <x-layout>

<x-layout>
    <x-slot:title>
        Enter phone number | Epoll
    </x-slot:title>
    <div class="flex-1 flex flex-col justify-center items-center format lg:format-lg w-[400px]">
        <form action="{{ route('signIn.verifyPhone') }}" method="post">
            @csrf
            <h2>Step 2 of 2.</h2>
            <p>Please enter a 4-digit verification code that has been sent to your phone number {{ $phone_number }}.</p>
            <x-input id="phone_number" name="phone_number" root-class="hidden" type="text" hidden
                     value="{{ $phone_number }}">
                Phone number
            </x-input>
            <x-input root-class="" id="code" name="code" type="text" placeholder="1234" required autofocus
                     value="{{ old('code') }}">
                Verification code
            </x-input>
            @error('code')
            <span class="not-format text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <x-button type="submit">Send</x-button>
            </div>
        </form>
    </div>
</x-layout>

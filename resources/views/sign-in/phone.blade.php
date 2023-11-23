<x-layout>
    <x-slot:title>
        Enter phone number | Epoll
    </x-slot:title>
    <div class="flex-1 flex flex-col justify-center items-center format lg:format-lg w-[400px]">
        <form action="{{ route('signIn.savePhone') }}" method="post">
            @csrf
            <h2>Step 1 of 2.</h2>
            <p>Please enter your phone number. You will receive a 4-digit code to verify your identity.</p>
            <x-input root-class="" id="phone_number" name="phone_number" type="tel" placeholder="+34XXXXXXXXX"
                     pattern="+34[0-9]{9}"
                     required autofocus value="{{ old('phone_number') }}"
            >
                Phone number
            </x-input>
            @error('phone_number')
            <span class="not-format text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <x-button type="submit">Send</x-button>
            </div>
        </form>
    </div>
</x-layout>

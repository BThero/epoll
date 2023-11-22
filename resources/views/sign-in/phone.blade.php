<x-layout>
    <x-slot:title>
        Enter phone number
    </x-slot:title>
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
</x-layout>

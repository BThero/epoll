<x-layout>
    <x-slot:title>
        Enter phone number | Epoll
    </x-slot:title>
    <div class="flex-1 flex flex-col justify-center items-center format lg:format-lg w-[400px]">
        <form action="{{ route('signIn.savePhone') }}" method="post">
            @csrf
            <h2>Step 1 of 2.</h2>
            <p>Please enter your phone number. You will receive a 4-digit code to verify your identity.</p>
            <div>
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                    number</label>
                <input type="tel" id="phone_number" name="phone_number"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="+34XXXXXXXXX" pattern="+34[0-9]{9}" required value="{{ old('phone_number') }}">
            </div>
            @error('phone_number')
            <span class="not-format text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <x-button type="submit">Send</x-button>
            </div>
        </form>
    </div>
</x-layout>

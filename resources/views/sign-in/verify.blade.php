<x-layout>
    <x-slot:title>
        Enter phone number | Epoll
    </x-slot:title>
    <div class="flex-1 flex flex-col justify-center items-center format lg:format-lg w-[400px]">
        <form action="{{ route('signIn.verifyPhone') }}" method="post">
            @csrf
            <h2>Step 2 of 2.</h2>
            <p>Please enter a 4-digit verification code that has been sent to your phone number {{ $phone_number }}.</p>
            <div>
                <label hidden>
                    Phone number
                    <input type="text" hidden value="{{ $phone_number }}" name="phone_number"/>
                </label>
            </div>
            <div>
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verification
                    code</label>
                <input type="text" id="code" name="code"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="1234" required value="{{ old('code') }}"/>
            </div>
            @error('code')
            <span class="not-format text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <x-button type="submit">Send</x-button>
            </div>
        </form>
    </div>
</x-layout>

<x-signed-in-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <main class="mt-2 p-4">
        @isset(auth()->user()->name)
            <p class="text-end">Welcome back {{ auth()->user()->name }}!</p>
        @else
            <p class="text-end">Welcome stranger! Please fill out your name in Profile page</p>
        @endisset

        @if ($new_responses === 0)
            <p class="text-end">There were no responses within the last day.</p>
        @elseif ($new_responses === 1)
            <p class="text-end">There is 1 new response within the last day.</p>
        @else
            <p class="text-end">There are {{ $new_responses }} new responses within the last day.</p>
        @endif
    </main>
</x-signed-in-layout>

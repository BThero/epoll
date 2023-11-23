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
    </main>
</x-signed-in-layout>

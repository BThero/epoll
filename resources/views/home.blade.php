<x-layout>
    <x-slot:title>
        Home | Epoll
    </x-slot:title>
    <div class="border-b border-black p-2">
        Hi! Your phone number is {{ auth()->user()->phone_number }}
    </div>
    <nav>
        <a href="{{ route('polls.index') }}">Polls</a>
        <a href="{{ route('options.index') }}">Options</a>
    </nav>
</x-layout>

<x-layout>
    <x-slot:title>
        Home | Epoll
        </x-slot>
        <div class="border-b border-black p-2">
            Hi! Your phone number is {{ auth()->user()->phone_number  }}}
        </div>
        <nav>
            <a href="{{ route('polls.index') }}">Polls</a>
        </nav>
</x-layout>

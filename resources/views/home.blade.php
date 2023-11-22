<x-layout>
    <x-slot:title>
        Home | Epoll
        </x-slot>
        <div class="border-b-1 border-black">
            Hi! Your phone number is {{ auth()->user()->phone_number  }}}
        </div>
</x-layout>

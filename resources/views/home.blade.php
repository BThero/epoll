<x-layout>
    <x-slot:title>
        Home | Epoll
        </x-slot>
        <div class="border-b border-black p-2">
            Hi! Your phone number is {{ auth()->user()->phone_number  }}}
        </div>
        <div>
            @if (count($polls) > 0)
                <p>Your polls:</p>

                <ul>
                    @foreach($polls as $poll)
                        <p>Poll with ID {{ $poll->id }}}</p>
                    @endforeach
                </ul>
            @else
                You don't have any polls
            @endif
        </div>
</x-layout>

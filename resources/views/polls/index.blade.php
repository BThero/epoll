<x-signed-in-layout>
    <x-slot:title>
        Polls
    </x-slot:title>
    <div>
        @if (count($polls) > 0)
            <p>Your polls:</p>

            <ul>
                @foreach($polls as $poll)
                    <li>
                        <a href="{{ route('polls.show', ['poll' => $poll->id]) }}">{{ $poll->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            You don't have any polls
        @endif
    </div>
    <div>
        <a href="{{ route('polls.create') }}">Create a new poll</a>
    </div>
</x-signed-in-layout>

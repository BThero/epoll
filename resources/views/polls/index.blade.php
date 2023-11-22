<x-layout>
    <x-slot:title>
        Polls
    </x-slot:title>
    <div>
        @if (count($polls) > 0)
            <p>Your polls:</p>

            <ul>
                @foreach($polls as $poll)
                    <p>Poll with ID {{ $poll->id }}</p>
                @endforeach
            </ul>
        @else
            You don't have any polls
        @endif
    </div>
    <div>
        <a href="{{ route('polls.create') }}">Create a new poll</a>
    </div>
</x-layout>

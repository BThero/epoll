<x-signed-in-layout>
    <x-slot:title>
        Polls
    </x-slot:title>
    <main class="p-4 mt-10">
        <div class="not-format flex justify-end">
            <x-link type="button" href="{{ route('polls.create') }}">
                Create a new poll
            </x-link>
        </div>
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
    </main>
</x-signed-in-layout>

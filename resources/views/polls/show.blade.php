<x-layout>
    <x-slot:title>
        Poll | {{ $poll->title ?? 'Not found' }}
    </x-slot:title>
    <div>
        @isset($poll)
            <p>This is poll {{ $poll->id }}</p>
            <p>Title: {{ $poll->title }}</p>
            <p>Question: {{ $poll->question }}</p>
            <p>Description: {{ $poll->description ?? '-' }}</p>
        @endisset
        @empty($poll)
            <p>Poll Not found</p>
        @endempty
    </div>
    <div>
        <a href="{{ route('polls.index') }}">Back</a>
        <a href="{{ route('polls.edit', $poll) }}">Edit</a>
        <form action="{{ route('polls.destroy', $poll) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-layout>

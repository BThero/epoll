<x-signed-in-layout>
    <x-slot:title>
        Poll | {{ $poll->title }}
    </x-slot:title>
    <div>
        <p>This is poll {{ $poll->id }}</p>
        <p>Title: {{ $poll->title }}</p>
        <p>Question: {{ $poll->question }}</p>
        <p>Description: {{ $poll->description ?? '-' }}</p>
        @if($poll->user_id === auth()->user()->id)
            <p>Closed at: {{ $poll->closed_at ?? '-' }}</p>
            <div>
                Options:
                @foreach($poll->options as $option)
                    <div>
                        Option {{ $option->value }}
                    </div>
                @endforeach
            </div>
        @else
            <div>
                Options:
                <form action="{{ route('responses.store') }}" method="POST">
                    @csrf
                    <label hidden>
                        Poll
                        <input type="text" value="{{ $poll->id }}" name="poll_id"/>
                    </label>
                    @foreach($poll->options as $option)
                        <label>
                            <input type="radio" name="option_id" value="{{ $option->id }}">
                            {{ $option->value }}
                        </label>
                    @endforeach
                    @error('option_id')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                    <div>
                        <button type="submit">Vote</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('polls.index') }}">Back</a>
        @if($poll->user_id === auth()->user()->id)
            <a href="{{ route('polls.edit', $poll) }}">Edit</a>
            <form action="{{ route('polls.destroy', $poll) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    </div>
</x-signed-in-layout>

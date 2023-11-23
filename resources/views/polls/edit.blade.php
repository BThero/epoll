<x-layout>
    <x-slot:title>
        Edit poll | {{ $poll->title }}
    </x-slot:title>
    <form action="{{ route('polls.update', $poll)  }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $poll->title }}">
            @error('title')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="question">Question</label>
            <input type="text" name="question" id="question" value="{{ $poll->question }}">
            @error('question')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ $poll->description }}">
            @error('description')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="options">Options (check all you want)</label>
            @foreach($options as $option)
                <div>
                    <label>
                        <input type="checkbox" name="{{'option-' . $option->id}}"
                               id="{{'option-' . $option->id}}"
                            @checked(old('option-' . $option->id, $option->checked))
                        />
                        {{ $option->value }}
                    </label>
                </div>
            @endforeach
            <input type="text" name="options" id="options" value="{{ old('options') }}">
            @error('options')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</x-layout>

<x-signed-in-layout>
    <x-slot:title>
        Create a poll
    </x-slot:title>
    <main class="mt-2 p-4 w-full">
        <form action="{{ route('polls.store') }}" method="POST">
            @csrf
            <x-input id="title" name="title" root-class="" type="text" required value="{{ old('title') }}" autofocus>
                Title
            </x-input>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
            <x-input id="question" name="question" root-class="" type="text" required value="{{ old('question') }}">
                Question
            </x-input>
            @error('question')
            <div>{{ $message }}</div>
            @enderror
            <x-input id="description" name="description" root-class="" type="text" value="{{ old('description') }}">
                Description
            </x-input>
            @error('description')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <label for="options">Options (check multiple)</label>
                @foreach($options as $option)
                    <div>
                        <label>
                            <input type="checkbox" name="{{'option-' . $option->id}}"
                                   id="{{'option-' . $option->id}}"/>
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
                <button type="submit">Create</button>
            </div>
        </form>
    </main>
</x-signed-in-layout>

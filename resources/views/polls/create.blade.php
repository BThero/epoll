<x-layout>
    <x-slot:title>
        Create a poll
    </x-slot:title>
    <div>
        <form action="{{ route('polls.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="question">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question') }}">
                @error('question')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}">
                @error('description')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</x-layout>
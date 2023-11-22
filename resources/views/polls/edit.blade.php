<x-layout>
    <x-slot:title>
        Edit poll | {{ $poll->title }}
    </x-slot:title>
    <form action="{{ route('polls.update', $poll)  }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>
                Title:
                <input type="text" name="title" value="{{ $poll->title }}">
            </label>
        </div>
        <div>
            <label>
                Question:
                <input type="text" name="question" value="{{ $poll->question }}">
            </label>
        </div>
        <div>
            <label>
                Description:
                <input type="text" name="description" value="{{ $poll->description }}">
            </label>
        </div>
        <button type="submit">Save</button>
    </form>
</x-layout>

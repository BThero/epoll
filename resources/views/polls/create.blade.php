<x-signed-in-layout>
    <x-slot:title>
        Create a poll
    </x-slot:title>
    <main class="mt-2 p-4 w-full">
        <form action="{{ route('polls.store') }}" method="POST" class="space-y-2">
            @csrf
            <x-input id="title" name="title" root-class="" type="text" required value="{{ old('title') }}"
                     autofocus>
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
                <label class="text-sm font-medium text-gray-900 dark:text-gray-300">Options (check
                    multiple)</label>
                @foreach($options as $option)
                    <x-checkbox root-class="" :name="'option-' . $option->id"
                                :id="'option-' . $option->id" :disabled="false" :checked="false">
                        {{ $option->value }}
                    </x-checkbox>
                @endforeach
                @error('options')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <x-button type="submit">Create</x-button>
        </form>
    </main>
</x-signed-in-layout>

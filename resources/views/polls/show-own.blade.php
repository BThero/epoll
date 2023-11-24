<x-signed-in-layout>
    <x-slot:title>
        Poll | {{ $poll->title }}
    </x-slot:title>
    <main class="p-4 mt-8 not-format space-y-4">
        <div class="flex justify-between items-center">
            <div class="flex flex-row items-center gap-2">
                <h1 class="text-3xl text-gray-900 font-extrabold dark:text-white">
                    <x-link type="default" href="{{route('polls.index')}}">Polls</x-link>
                    / {{ $poll->title }}
                </h1>
                @if ($poll->closed())
                    <x-badge type="dark">Closed</x-badge>
                @else
                    <x-badge type="default">Open</x-badge>
                @endif
            </div>
            <div class="flex flex-row items-center gap-4">
                <x-link type="button" href="{{ route('polls.edit', $poll) }}">
                    Edit
                </x-link>
                <form action="{{ route('polls.destroy', $poll) }}" method="POST" class="h-fit m-0">
                    @csrf
                    @method('DELETE')
                    <x-button>Delete</x-button>
                </form>
            </div>
        </div>
        <div class="space-y-2">
            <x-input id="title" name="title" root-class="" type="text" required disabled value="{{ $poll->title }}"
                     autofocus>
                Title
            </x-input>

            <x-input id="question" name="question" root-class="" type="text" required disabled
                     value="{{ $poll->question }}">
                Question
            </x-input>

            <x-input id="description" name="description" root-class="" type="text" disabled
                     value="{{ $poll->description }}">
                Description
            </x-input>

            <div>
                <label class="text-sm font-medium text-gray-900 dark:text-gray-300">Options</label>
                @foreach($poll->options as $option)
                    <x-checkbox root-class="" :name="'option-' . $option->id"
                                :id="'option-' . $option->id" :disabled="true" :checked="true">
                        {{ $option->value }}
                    </x-checkbox>
                @endforeach
                @error('options')
                <div>{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div>
            <x-link href="{{ route('polls.responses', $poll) }}" type="default">See {{$poll->responses_count}} response
                (-s)
            </x-link>
        </div>
    </main>
</x-signed-in-layout>

<x-signed-in-layout>
    <x-slot:title>
        Poll | {{ $poll->title }}
    </x-slot:title>
    @if ($poll->user_id === auth()->user()->id)
        <main class="p-4 mt-8 not-format">
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
            <div class="mt-4 space-y-2">
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
        </main>
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
</x-signed-in-layout>

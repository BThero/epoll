<x-signed-in-layout>
    <x-slot:title>
        Edit Poll | {{ $poll->title }}
    </x-slot:title>
    <main class="p-4 mt-8 not-format">
        <form action="{{ route('polls.update', $poll)  }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center">
                <h1 class="text-3xl text-gray-900 font-extrabold dark:text-white">
                    <x-link type="default" href="{{route('polls.index')}}">Polls</x-link>
                    / {{ $poll->title }}
                </h1>
                <div class="flex flex-row items-center gap-4">
                    <x-button>
                        Save
                    </x-button>
                    <x-link type="button" href="{{route('polls.show', $poll)}}">
                        Cancel
                    </x-link>
                </div>
            </div>
            <div class="mt-4 space-y-2">
                <x-input id="title" name="title" root-class="" type="text" required value="{{ $poll->title }}"
                         autofocus>
                    Title
                </x-input>

                <x-input id="question" name="question" root-class="" type="text" required
                         value="{{ $poll->question }}">
                    Question
                </x-input>

                <x-input id="description" name="description" root-class="" type="text"
                         value="{{ $poll->description }}">
                    Description
                </x-input>

                <div>
                    <label class="text-sm font-medium text-gray-900 dark:text-gray-300">Options</label>
                    @foreach($options as $option)
                        <x-checkbox root-class="" :name="'option-' . $option->id"
                                    :id="'option-' . $option->id"
                                    :checked="$option->checked"
                                    :disabled="false">
                            {{ $option->value }}
                        </x-checkbox>
                    @endforeach
                    @error('options')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-900 dark:text-gray-300">Extra</label>
                    <x-checkbox root-class="" name="closed"
                                id="closed"
                                :checked="$poll->closed()"
                                :disabled="false">
                        Close poll
                    </x-checkbox>
                </div>
            </div>
        </form>
    </main>
</x-signed-in-layout>

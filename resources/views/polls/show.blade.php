<x-signed-in-layout>
    <x-slot:title>
        Poll | {{ $poll->title }}
    </x-slot:title>
    <main class="p-4 mt-8 not-format">
        <h1 class="text-5xl text-gray-900 font-extrabold dark:text-white">
            {{ $poll->title }}
        </h1>
        <h2 class="text-4xl font-extrabold dark:text-white">{{$poll->question}}</h2>

        @isset($poll->description)
            <p class="mt-4 text-gray-500 dark:text-gray-300">{{ $poll->description }}</p>
        @endisset

        <form class="mt-4" action="{{ route('responses.store') }}" method="POST">
            @csrf
            <x-input root-class="hidden" id="poll_id" name="poll_id" value="{{$poll->id}}" type="text"
                     required>
                Poll ID
            </x-input>

            <div class="flex flex-row flex-wrap items-center justify-start gap-4">
                @foreach($poll->options as $option)
                    <x-radio root-class="" name="option_id"
                             value="{{$option->id}}"
                             :id="'option-' . $option->id" :disabled="false" :checked="false">
                        {{ $option->value }}
                    </x-radio>
                @endforeach
            </div>
            @error('option_id')
            <div>{{ $message }}</div>
            @enderror

            <div class="mt-4">
                <x-button>Submit</x-button>
            </div>
        </form>
    </main>
</x-signed-in-layout>

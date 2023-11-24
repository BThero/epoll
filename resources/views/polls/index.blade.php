<x-signed-in-layout>
    <x-slot:title>
        Polls
    </x-slot:title>
    <main class="p-4 mt-8 not-format space-y-10">
        <div class="flex justify-between items-center">
            <h1 class="text-5xl text-gray-900 font-extrabold dark:text-white">
                Polls
            </h1>
            <x-link type="button" href="{{ route('polls.create') }}">
                Create a new poll
            </x-link>
        </div>
        @if (count($polls) > 0)
            @foreach($polls as $poll)
                <div class="w-full p-2 flex justify-between items-center border-b">
                    <div>
                        <span class="block text-gray-900 text-xl font-bold dark:text-white">{{ $poll->title }}</span>
                        <span class="block text-gray-700 text-sm dark:text-grat-300">{{$poll->question}}</span>
                    </div>
                    <div class="flex gap-4">
                        <x-link type="button" href="{{ route('polls.show', ['poll' => $poll->id]) }}">Open</x-link>
                    </div>
                </div>
            @endforeach
        @else
            <span>You don't have any polls</span>
        @endif
    </main>
</x-signed-in-layout>

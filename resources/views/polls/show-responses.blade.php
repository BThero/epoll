<x-signed-in-layout>
    <x-slot:title>
        Poll Responses | Epoll
    </x-slot:title>
    <main class="p-4 mt-8 not-format space-y-10">
        <div class="flex justify-between items-center">
            <div class="flex flex-row items-center gap-2">
                <h1 class="text-3xl text-gray-900 font-extrabold dark:text-white">
                    <x-link type="default" href="{{route('polls.index')}}">Polls</x-link>
                    /
                    <x-link type="default" href="{{route('polls.show', $poll)}}">{{$poll->title}}</x-link>
                    / Responses
                </h1>
            </div>
        </div>
        @if (count($poll->responses) > 0)
            @foreach($poll->responses as $response)
                <div class="w-full p-2 flex justify-between items-center border-b">
                    <div>
                        <span
                            class="block text-gray-900 text-xl font-bold dark:text-white">{{ $response->user->phone_number }}</span>
                        <span
                            class="block text-gray-700 text-sm dark:text-gray-300">{{$response->created_at}}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="block text-gray-900 text-xl font-bold dark:text-white">
                            {{ $response->option->value }}
                        </span>
                    </div>
                </div>
            @endforeach
        @else
            <span>There are no responses for this poll</span>
        @endif
    </main>
</x-signed-in-layout>

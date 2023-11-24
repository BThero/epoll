<x-signed-in-layout>
    <x-slot:title>
        Options | Epoll
    </x-slot:title>
    <main class="p-4 mt-8 not-format space-y-10">
        <div class="flex justify-between items-center">
            <h1 class="text-5xl text-gray-900 font-extrabold dark:text-white">
                Options
            </h1>
            <x-link type="button" href="{{ route('options.create') }}">
                Create a new option
            </x-link>
        </div>
        @if (count($options) > 0)
            @foreach($options as $option)
                <div class="w-full p-2 flex justify-between items-center border-b">
                    <div>
                        <span class="block text-gray-900 text-xl font-bold dark:text-white">{{ $option->value }}</span>
                        <span
                            class="block text-gray-700 text-sm dark:text-grat-300">{{$option->public() ? 'Public' : 'Private'}}</span>
                    </div>
                    @if(!$option->public())
                        <div class="flex gap-4">
                            <x-link type="button" href="{{ route('options.show', $option) }}">Open
                            </x-link>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <span>There are no options</span>
        @endif
    </main>
</x-signed-in-layout>

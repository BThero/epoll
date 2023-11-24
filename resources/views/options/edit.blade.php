<x-signed-in-layout>
    <x-slot:title>
        Edit option {{ $option->value }} | Epoll
    </x-slot:title>
    <main class="p-4 mt-8 not-format">
        <form action="{{ route('options.update', $option) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center">
                <div class="flex flex-row items-center gap-2">
                    <h1 class="text-3xl text-gray-900 font-extrabold dark:text-white">
                        <x-link type="default" href="{{route('options.index')}}">Options</x-link>
                        / {{ $option->value }}
                    </h1>
                </div>
                <div class="flex flex-row items-center gap-4">
                    <x-button>
                        Save
                    </x-button>
                    <x-link type="button" href="{{route('options.show', $option)}}">
                        Cancel
                    </x-link>
                </div>
            </div>
            <div class="mt-4 space-y-2">
                <x-input id="value" name="value" root-class="" type="text" required
                         value="{{ $option->value }}"
                         autofocus>
                    Value
                </x-input>
            </div>
        </form>
    </main>
</x-signed-in-layout>

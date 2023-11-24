<x-signed-in-layout>
    <x-slot:title>
        Option {{$option->id ?? 'Not found'}}} | Epoll
    </x-slot:title>
    <main class="p-4 mt-8 not-format">
        <div class="flex justify-between items-center">
            <div class="flex flex-row items-center gap-2">
                <h1 class="text-3xl text-gray-900 font-extrabold dark:text-white">
                    <x-link type="default" href="{{route('options.index')}}">Options</x-link>
                    / {{ $option->value }}
                </h1>
            </div>
            <div class="flex flex-row items-center gap-4">
                <x-link type="button" href="{{ route('options.edit', $option) }}">
                    Edit
                </x-link>
                <form action="{{ route('options.destroy', $option) }}" method="POST" class="h-fit m-0">
                    @csrf
                    @method('DELETE')
                    <x-button>Delete</x-button>
                </form>
            </div>
        </div>
        <div class="mt-4 space-y-2">
            <x-input id="value" name="value" root-class="" type="text" required disabled value="{{ $option->value }}"
                     autofocus>
                Value
            </x-input>
        </div>
    </main>
</x-signed-in-layout>

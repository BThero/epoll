<x-signed-in-layout>
    <x-slot:title>
        Create an option | Epoll
    </x-slot:title>
    <main class="mt-2 p-4 w-full">
        <form action="{{ route('options.store') }}" method="POST" class="space-y-2">
            @csrf
            <x-input id="value" name="value" root-class="" type="text" required value="{{ old('value') }}"
                     autofocus>
                Value
            </x-input>
            @error('value')
            <div>{{ $message }}</div>
            @enderror
            <x-button type="submit">Create</x-button>
        </form>
    </main>
</x-signed-in-layout>

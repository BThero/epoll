<x-layout>
    <x-slot:title>
        Edit Option {{ $option->value }} | Epoll
    </x-slot:title>
    <div class="border border-black p-2">
        <form action="{{ route('options.update', $option) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="value">Value</label>
                <input type="text" name="value" id="value" value="{{ $option->value }}">
                @error('value')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Edit</button>
        </form>
    </div>
</x-layout>

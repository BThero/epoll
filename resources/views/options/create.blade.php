<x-layout>
    <x-slot:title>
        Create Option | Epoll
    </x-slot:title>
    <div class="border border-black p-2">
        <form action="{{ route('options.store') }}" method="POST">
            @csrf
            <div>
                <label for="value">Value</label>
                <input type="text" name="value" id="value" value="{{ old('value') }}">
                @error('value')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</x-layout>

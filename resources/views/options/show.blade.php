<x-layout>
    <x-slot:title>
        Option {{$option->id ?? 'Not found'}}} | Epoll
    </x-slot:title>
    <div class="border border-black p-2">
        <p>Option ID:{{ $option->id }}</p>
        <p>Value: {{ $option->value  }}</p>
        @if($option->user_id === null)
            <p>Public</p>
        @else
            <p>Private</p>
        @endif
        <p>Created at: {{ $option->created_at }}</p>
        <p>Updated at: {{ $option->updated_at }}</p>
        <div>
            <a href="{{ route('options.index') }}">Back</a>

            @if($option->user_id !== null)
                <a href="{{ route('options.edit', $option) }}">Edit</a>
                <form action="{{ route('options.destroy', $option) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </div>
        <hr>
    </div>
</x-layout>
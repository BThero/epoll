<x-layout>
    <x-slot:title>
        Options | Epoll
    </x-slot:title>
    <div>
        <h1>Options</h1>
        <hr>
        @foreach($options as $option)
            <div class="border border-black p-2">
                <p>Option {{ $option->value }}</p>
                @if($option->public())
                    <p>Public</p>
                @else
                    <p>Private</p>
                @endif
                <div>
                    <a href="{{ route('options.show', $option) }}">Show</a>
                </div>
                <hr>
            </div>
        @endforeach
        <a href="{{ route('options.create') }}">Create</a>
    </div>
</x-layout>

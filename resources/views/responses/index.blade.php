<x-signed-in-layout>
    <x-slot:title>
        Your responses | Epoll
    </x-slot:title>
    <div>
        <h1>Your responses</h1>
        <ul>
            @foreach($responses as $response)
                <li>
                    <a href="{{ route('responses.show', $response) }}">{{ $response->id }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-signed-in-layout>

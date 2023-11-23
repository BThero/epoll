<x-signed-in-layout>
    <x-slot:title>
        Response | {{ $response->id }}
    </x-slot:title>
    <div>
        <p>This is response {{ $response->id }}</p>
        <p>Poll: {{ $response->poll->title }}</p>
        <p>Option: {{ $response->option->value }}</p>
        <p>Created at: {{ $response->created_at }}</p>
    </div>
    <div>
        <a href="{{ route('responses.index') }}">Back to responses</a>
    </div>
</x-signed-in-layout>

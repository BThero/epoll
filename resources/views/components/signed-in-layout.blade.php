<x-layout>
    <x-slot:title>
        {{ $title ?? 'Title not specified' }}
    </x-slot:title>
    <div class="format lg:format-lg flex-1 w-full">
        <x-nav-bar/>
        {{ $slot }}
    </div>
</x-layout>

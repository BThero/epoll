<x-signed-in-layout>
    <x-slot:title>
        Profile | Epoll
    </x-slot:title>
    <main class="p-4 mt-8 not-format space-y-10">
        <div class="flex justify-between items-center">
            <h1 class="text-5xl text-gray-900 font-extrabold dark:text-white">
                Profile
            </h1>
        </div>
        <div class="flex items-center justify-between">
            <div class="w-[200px] h-[200px] rounded-full bg-gray-700"></div>
        </div>
        <form class="space-y-2" action="{{ route('profile.update', auth()->user()) }}" method="POST">
            @csrf
            @method('PUT')
            <x-input root-class="" type="text" name="name" id="name" placeholder="Name"
                     value="{{ auth()->user()->name }}"
                     required>
                Your Name (optional)
            </x-input>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <x-button>Save</x-button>
        </form>
    </main>
</x-signed-in-layout>

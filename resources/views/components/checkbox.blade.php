<div class="{{"flex items-center".$root_class }}">
    <input type="checkbox" name="{{ $name }}"
           id="{{ $id }} " class="{{$class}}"
        {{$attributes}} />
    <label for="{{$id}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ $slot }}
    </label>
</div>

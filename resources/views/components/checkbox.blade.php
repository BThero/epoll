<div class="{{"flex items-center"." ".$root_class }}">
    <input type="checkbox" name="{{ $name }}"
           id="{{ $id }} " class="{{$class}}"
        {{$attributes}} @disabled($disabled) @checked($checked) />
    <label for="{{$id}}" class="ms-2 text-sm font-medium @class([
            "text-gray-900 dark:text-gray-300" => !$disabled,
            "text-gray-400 dark:text-gray-500" => $disabled
        ])">
        {{ $slot }}
    </label>
</div>

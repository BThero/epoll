@if ($type === 'default')
    <a href="{{$href}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$slot}}</a>
@elseif ($type === 'button')
    <a href="{{$href}}"
       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{$slot}}</a>
@else
    <a href="#">Invalid link</a>
@endif

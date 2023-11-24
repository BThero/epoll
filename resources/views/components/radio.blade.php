<div class="{{"flex items-center"." ".$root_class}}">
    <input id="{{$id}}" type="radio" name="{{$name}}" {{$attributes}}
    class="{{$input_class}}" @disabled($disabled) @checked($checked) />
    <label for="default-radio-1" class="{{$label_class}}">{{$slot}}</label>
</div>

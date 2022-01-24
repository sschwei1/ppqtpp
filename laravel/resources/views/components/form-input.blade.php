@if(!$hidden)

        <label  class='{{$labelClass}}' for='{{$id}}'>{{$title}}</label>
        @if($slot->isNotEmpty())
            {{ $slot }}
        @else
            <input
                id='{{$id}}'
                name='{{$id}}'
                type='{{$type}}'
                placeholder='{{$placeholder}}'
                value='{{old($id, $value)}}'
                class='{{$class}}'

            />
        @endif
        <span style='color:red'>@error($id){{$message}}@enderror</span>
        <br />
@else
    <input type='hidden' name='{{$id}}' id='{{$id}}'  value='{{$value}}' placeholder="{{$placeholder}}">
@endif

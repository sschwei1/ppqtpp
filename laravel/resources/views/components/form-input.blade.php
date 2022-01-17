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
                value='{{$value}}'
                class='{{$class}}'

            />
        @endif
        <br />
        <span style='color:red'>@error($id){{$message}}@enderror</span>
        <br />
@else
    <input type='hidden' name='{{$id}}' id='{{$id}}'  value='{{$value}}' placeholder="{{$placeholder}}">
@endif

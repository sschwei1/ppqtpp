@if(!$hidden)
    <div class='row'>
        <label for='{{$id}}'>{{$title}}</label>
        @if($slot->isNotEmpty())
            {{ $slot }}
        @else
            <input
                id='{{$id}}'
                name='{{$id}}'
                type='{{$type}}'
                placeholder='{{$placeholder}}'
                value='{{$value}}'
            />
        @endif
        <br />
        <span style='color:red'>@error($id){{$message}}@enderror</span>
        <br />
    </div>
@else
    <input id='{{$id}}' name='{{$id}}' type='hidden' value='{{$value}}'  />
@endif

<div>
    @if(isset($title))
        <div>{{ $title }}</div>
        <br />
    @endif
    <form action='{{ route($action) }}' method='{{ $method }}'>
        @csrf
        {{$slot}}
        <div class='row'>
            <button type='submit'>{{ $submit }}</button>
        </div>
    </form>
</div>

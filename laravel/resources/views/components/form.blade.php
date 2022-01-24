<div>
    @if(isset($title))
    @endif
    <form action='{{ route($action) }}' method='{{ $method }}'>

        <div class="spacer"></div>
        <div class="form-group">
            @csrf
            {{$slot}}

            <button style='width: 50%; margin: 15px auto; display: block' class="btn btn-primary" type='submit'>{{ $submit }}</button>
        </div>
    </form>
</div>

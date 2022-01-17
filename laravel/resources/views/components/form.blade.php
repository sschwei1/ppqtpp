<div>
    @if(isset($title))
    @endif
    <form action='{{ route($action) }}' method='{{ $method }}'>

        <div class="spacer"></div>
        <div class="form-group">

        @csrf
        {{$slot}}
        </div>

            <button  class="btn btn-primary" type='submit'>{{ $submit }}</button>

    </form>
</div>

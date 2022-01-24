<div>
    <nav class="navbar shadow-lg">

        @if(!empty($link))
            <a href="{{$link}}"> <i class="navicon fa fa-chevron-left" aria-hidden="true"></i></a>
        @else
            <div></div>
        @endif

        @if(!empty($title))
            <h3 style='text-align: center; margin-bottom: 0;' class='cols primaryColorText'>{{ $title }}</h3>
        @endif

        <img style="width: 60px" src="{{URL::asset('img/logo_transparent.png')}}" alt="Logo"/>

    </nav>
</div>

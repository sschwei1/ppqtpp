<div>
    <nav class="navbar shadow-lg">

        @if(!empty($link))
            <a href="{{$link}}"> <i class="navicon fa fa-chevron-left" aria-hidden="true"></i></a>
        @else
            <div></div>
        @endif

        <img style="width: 60px" src="{{URL::asset('img/logo_transparent.png')}}" alt="Logo"/>

    </nav>
</div>

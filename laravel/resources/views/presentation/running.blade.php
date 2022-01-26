<x-page>
    <x-header :link="route('view.session.overview', ['id' => $presentationId])" />

    <div style="margin-top: 20px" class="container">
        <div class="row">
            <div class="cols primaryColorText">

                <h4 style="color: whitesmoke">Fragen</h4>
            </div>

            <div class="col">
                <a type="button" id="start" class="btn btn-primary menuButton" href=''>Refresh</a>
                <a type="button" id="start" class="btn btn-primary menuButton" href='{{route('session.end', ['id' => $presentationId])}}'>End</a>
            </div>
        </div>
    </div>

    <hr>


    @if(count($questions) > 0)
        <div id="carouselExampleControls" data-wrap="false"  class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
{{--                <div class="carousel-item active">--}}
{{--                    <div style="margin-top: 20px;" class="container">--}}
{{--                        <div class="row">--}}
{{--                            <divs class="cols primaryColorText">--}}
{{--                                <h4>User</h4>--}}
{{--                            </divs>--}}

{{--                            <div class="col ">--}}
{{--                                <h5 style="color: white">timestamp</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p style="color: whitesmoke; margin: 10%">dsfjdaoäfojadhs oäsda fäfsda of osäda fäasädf oäadoäf adsoä fhäd äf äsodaf oähsdähofuda ähfäudf häsdäfhosäd ?</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

                {{--TODO: add For each --}}
                @foreach($questions->toArray() as $key => $question)
                    <div class="carousel-item carousel {{$key == 0 ? 'active' : ''}}">
                        <div class="container">
                            <div class="row">
                                <divs class="cols primaryColorText">
                                    <h4>{{$question['username']}}</h4>
                                </divs>

                                <div class="col ">
                                    <h5 style="color: white">{{$question['timeStamp']}}</h5>
                                </div>
                            </div>
                            <p style="color: whitesmoke; margin: 10%">{{$question['question']}}</p>
                        </div>
                    </div>
                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif

</x-page>

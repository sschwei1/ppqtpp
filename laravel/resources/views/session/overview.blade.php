<x-page>
    <x-header :link="route('view.presentation.overview')" title="Presentation"/>

    <div class='container-fluid'>
    <div style="margin-top: 20px" class="row">
        <divs class="cols primaryColorText">
            <h2>{{ $name }}</h2>
        </divs>

        <div class="col">
            <a id="add" class="btn btn-primary menuButton" style='width: unset; margin: 0 20px 0 0;' href='{{route('view.session.add', ['id' => $id])}}'>add session</a>
        </div>
    </div>

    <div class="row">
        <divs class="cols primaryColorText">
            <p>{{ $theme }}</p>
        </divs>
        <div class="col ">
            <p>{{ $questionCount  }}</p>
        </div>
        </div>

        <div class="row">
            <div class="cols fullWidthCol primaryColorText">
                <p class="grayText">{{ $description }}</p>
            </div>
        </div>

        <hr />

        <h4 style="color: whitesmoke" class='cols primaryColorText'>Session List</h4>

        <hr>
    {{--TODO: add for each--}}
        @foreach($finishedSessions as $session)
            <x-session-overview-component
                :title='$session["title"]'
                :number-of-questions='$session["questionCount"]'
                :date='explode(" ", $session["startTime"])[0]'
                :duration='$session["duration"]'
                :url='route("view.session.info", [
                    "presentationId" => $id,
                    "sessionId" => $session["id"]
                    ])' />
        @endforeach
    </div>
</x-page>

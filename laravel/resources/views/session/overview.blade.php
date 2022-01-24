<x-page>
    <x-header :link="route('view.presentation.overview')" title="Presentation"/>

    <div class='container-fluid'>
    <div style="margin-top: 20px" class="row">
        <divs class="cols primaryColorText">
            <h2>{{ $name }}</h2>
        </divs>

        <div  class="col">
            <button type="button" id="add" class="btn btn-primary menuButton">add New</button>
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

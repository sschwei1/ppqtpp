<x-page>
    <x-header :link='route("view.session.overview", $presentationId)' title='Session' />

    <div class='container-fluid'>
        <div class="row">
            <divs class="cols primaryColorText">
                <h2>{{ $name }}</h2>
            </divs>

        </div>

        <div class="row">
            <divs class="cols primaryColorText">
                <p>{{ $presentationName }}</p>
            </divs>
            <div class="col">
                <p>{{ $questionCount }}</p>
            </div>
        </div>

       <div class="row">
        <divs class="cols primaryColorText">
            <p>{{ explode(" ", $date)[0] }}</p>
        </divs>
        <div class="col">
            <p>{{ $duration }}</p>
        </div>
        </div>

        <hr />

        <h4 style="color: whitesmoke" class='cols primaryColorText'>Question List</h4>

        <hr>
        @foreach($questions as $question)
            <x-session-info-component
                :user='$question["username"]'
                :question='$question["question"]'
                :timestamp='substr(explode(" ", $question["timeStamp"])[1], 0, -3)'
            />
        @endforeach
    </div>
</x-page>

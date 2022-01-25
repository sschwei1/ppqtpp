<x-page>
    <x-header :link="route('view.user.logout')" title="Overview" />

    <div style="margin-top: 20px" class="container">
        <div class="row">
            <div class="cols primaryColorText">

            </div>

            <div class="col">
                <h4 class='primaryColorText' style='display: inline-block;'>Presentation List</h4>
                <a style='color: black;margin: auto 20px auto auto;' href='{{ route('view.presentation.add') }}' id="add" class="btn btn-primary menuButton">add New</a>
            </div>
        </div>
    </div>

    <div class='container-fluid'>
        <hr>
        @foreach($presentations as $presentation)
            <x-presentation-component
                :title='$presentation["name"]'
                :description='$presentation["description"]'
                :number-of-question='$presentation["questionCnt"]'
                :url='route("view.session.overview", ["id" => $presentation["id"]])'/>
        @endforeach
    </div>
</x-page>

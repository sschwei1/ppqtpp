<x-page>
    <x-header/>

    <div style="margin-top: 20px" class="container">
        <div class="row">
            <div class="cols primaryColorText">

            </div>

            <div class="col">
                <button type="button" id="add" class="btn btn-primary menuButton">add New</button>
            </div>
        </div>
    </div>

    <hr>
{{--TODO: add for each--}}
    @foreach($presentations as $presentation)
    <x-presentation-component
        :title='$presentation["theme"]'
        :description='$presentation["description"]'
        :number-of-question='$presentation["questionCnt"]'
        :url='route("view.session.overview", ["id" => $presentation["id"]])'/>
    @endforeach
</x-page>

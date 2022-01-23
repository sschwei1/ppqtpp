<x-page>
    <x-header/>

    <div style="margin-top: 20px" class="row">
        <divs class="cols primaryColorText">
            <h2>Presentation</h2>
        </divs>

        <div  class="col">
            <button type="button" id="add" class="btn btn-primary menuButton">add New</button>
        </div>
    </div>

    <div class="row">
    <divs class="cols primaryColorText">
        <p>Thema</p>
    </divs>
    <div class="col ">
        <p>12</p>
    </div>
    </div>

    <div class="row">
        <div class="cols fullWidthCol primaryColorText">
            <p class="grayText">this is a presentation about things</p>
        </div>
    </div>


    <hr>
{{--TODO: add for each--}}
    <x-session-overview-component title='AI' description='lul' date="11.11.1111" number-of-question='6'/>

</x-page>

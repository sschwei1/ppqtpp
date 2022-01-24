<x-page>
    <x-header link="http://127.0.0.1:8000/sessionOveriew" />

    <div style="margin-top: 20px" class="container">
        <div class="row">
            <div class="cols primaryColorText">

                <h4 style="color: whitesmoke">Fragen</h4>
            </div>

            <div class="col">
                <button type="button" id="start" class="btn btn-primary menuButton">Start</button>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div style="width: 10%" class="cols">

        </div>


        <div style="width: 80%" class="cols">
        <div style="background-color: #585a61;   padding: 15px; margin-left: 20px; margin-right: 20px; height: 300px"
             class="questionBox">

            <div class="container">
                <div class="row">
                    <divs class="cols primaryColorText">
                        <h4>User</h4>
                    </divs>

                    <div class="col ">
                        <h5 style="color: white">timestamp</h5>
                    </div>
                </div>
                <p style="color: whitesmoke">question</p>
            </div>

        </div>
    </div>

    <div style="width: 10%" class="cols">
        <a style="margin-left: 0px; margin-top: 50%" href=""> <i style="margin-left: 0px; padding-top: 100px" class="navicon fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
    </div>

</x-page>

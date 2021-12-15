$(document).ready (function(){
    $('#uGay').submit((e) => {
        e.preventDefault();

        $("#successAlert").show();
        window.setTimeout(function () {
            $("#successAlert").hide();
        }, 2500);
    });

    $("#successAlert").hide();

});
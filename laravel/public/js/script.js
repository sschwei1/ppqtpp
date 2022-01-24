$(document).ready (function(){
    $('#killMe').submit((e) => {
        e.preventDefault();

        $("#successAlert").show();
        window.setTimeout(function () {
            $("#successAlert").hide();
        }, 2500);
    });

    $("#successAlert").hide();

});

$('.carousel').carousel({
    interval: false,
    wrap: false
});

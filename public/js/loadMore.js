$( document ).ready(function () {
    $(".trick").slice(0, 12).show();
    if ($(".trick:hidden").length != 0) {
        $("#load").show();
    }
    $("#load").on('click', function (e) {
        e.preventDefault();
        $(".trick:hidden").slice(0, 4).slideDown();
        if ($(".trick:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
    });
});
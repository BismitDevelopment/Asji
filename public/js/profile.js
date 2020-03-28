$(document).ready(function () {
    // console.log($(".card-deck"))
    $(".card-deck").slice(0, 2).show();
    if($(".card-deck:hidden").length != 0) {
        $("#loadMore").show();
    }   
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".card-deck:hidden").slice(0, 2).slideDown();
        if ($(".card-deck:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
    });
})
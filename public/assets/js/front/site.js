$(document).ready(function() {

/* *** partie login *** */
    $('#login').click(function() {
        $("#espace_login").animate({
            top: "0px",
            opacity: 1
          }, 1500 );
    });
    $('#close_login').click(function() {
        $("#espace_login").animate({
            top: "-114px",
            opacity: 0
          }, 1500 );
    });

/* *** partie feedback *** */
    $('#show-profiler').click(function() {
        $("#page-profiler").css({
            "display" : "block"
        });
        $("#page-profiler").animate({
            right: "0",
            opacity: 1
        }, 1500 );
    });
    $('#close-profiler').click(function() {
        $("#page-profiler").animate({
            right: "-100%",
            opacity: 0
        }, 1500 , function() {
            $("#page-profiler").css({
                "display" : "none"
            });
        });
    });
});
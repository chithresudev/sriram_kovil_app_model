$(document).ready(function() {
    feather.replace();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".expanded-sidebar").click(function(e) {
    $("main").toggleClass("d-block mobile-dv");
    $("#mysidebar").toggleClass("d-block");
});

});


// Navbar collapse

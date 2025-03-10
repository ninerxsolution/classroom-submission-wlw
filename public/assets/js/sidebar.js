$(document).ready(function () {
    // default active sidebar
    // $('#main_obj').addClass('active');
    // $('#sidebar_obj').addClass('active');
    // $('#navbar_obj').addClass('active');

    // sidebar toggle
    $('#sidebar_toggle').click(function () {
        if ($('#main_obj').hasClass('active')) {
            $('#main_obj').removeClass('active');
            $('#sidebar_obj').removeClass('active');
            $('#navbar_obj').removeClass('active');
        } else {
            $('#main_obj').addClass('active');
            $('#sidebar_obj').addClass('active');
            $('#navbar_obj').addClass('active');

        }
    });
});


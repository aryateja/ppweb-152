$(function () {
    // Initialize a Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    var url = window.location.href;
    var el  = $('ul.nav.navbar-nav > li');

    if (url.indexOf('category') > -1)
    {
        // el.addClass('active');
    }
});
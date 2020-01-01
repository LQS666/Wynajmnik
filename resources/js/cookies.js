$(document).ready(function () {
    if (document.cookie.replace(/(?:(?:^|.*;\s*)gt_accepted\s*\=\s*([^;]*).*$)|^.*$/, "$1") != "yes") {
        $('.cookie-wrapper').delay(3000).fadeIn(1500);
    };
    $('#cookie_accept_btn').click(function () {
        document.cookie = "gt_accepted=yes; expires=Mon, 24 Jun 2022 15:00:00 GMT; path=/";
        $('.cookie-wrapper').fadeOut(350);
    });
});
$(function () {
    /* Start sidr plugin */
    $('#right-menu').sidr({
        name: 'sidr-right',
        side: 'right'
    });

    /* Click to close menu */
    $(document).mouseup(function (e) {
        var container = $("#sidr");

        if (!container.is(e.target) // If the target isn't the container
            && container.has(e.target).length === 0) // and not a descendant
        {
            $.sidr('close', 'sidr-right');
        }
    });

    /* Smooth scroll for a tags */

    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});
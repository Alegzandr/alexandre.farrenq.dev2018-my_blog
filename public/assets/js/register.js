$(function () {
    $('form[name="signup"]').submit(function () {
        $('.errors').remove();

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    // If form ok
                }
                else {
                    // If not
                }
            }, 'json');

        return false;
    });
});

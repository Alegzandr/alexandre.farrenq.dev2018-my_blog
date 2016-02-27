$(function () {
    $('form[name="signin"]').submit(function () {
        $('.errors').remove();

        var username = $(this).find(':text[name="username"]');
        var password = $(this).find(':password[name="password"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    // If form ok
                }
                else {
                    if (data.username) {
                        username.after(data.username);
                    }
                    if (data.password) {
                        password.after(data.password);
                    }
                }
            }, 'json');

        return false;
    });
});

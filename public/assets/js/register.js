$(function () {
    $('form[name="signup"]').submit(function () {
        $('.errors').remove();
        $('.success').remove();

        var username = $(this).find(':text[name="username"]');
        var firstName = $(this).find(':text[name="first-name"]');
        var lastName = $(this).find(':text[name="last-name"]');
        var mail = $(this).find('input[name="mail"]');
        var password = $(this).find(':password[name="password"]');
        var password2 = $(this).find(':password[name="password2"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    if (data.create) {
                        $('form[name="signup"]').after(data.create);
                    }
                    else {
                        $('form[name="signup"]')
                            .after('<p class="success">Vous avez bien été inscrit.</p>' +
                                '<a href="/login">Se connecter ici.</a>')
                            .fadeOut();
                    }
                }
                else {
                    if (data.username) {
                        username.after(data.username);
                    }
                    if (data.firstName) {
                        firstName.after(data.firstName);
                    }
                    if (data.lastName) {
                        lastName.after(data.lastName);
                    }
                    if (data.mail) {
                        mail.after(data.mail);
                    }
                    if (data.password) {
                        password.after(data.password);
                    }
                    if (data.password2) {
                        password2.after(data.password2);
                    }
                }
            }, 'json');

        return false;
    });
});

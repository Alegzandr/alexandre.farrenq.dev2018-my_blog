$(function () {
    $('form[name="edit-profile"]').submit(function () {
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
                    $('form[name="edit-profile"]').after('<span class="success">Profil modifié.<span>');
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

    // Unsubscribe choice
    
    $('#unsubscribe').click(function () {
        $(this).fadeOut();
        $('form[name="edit-profile"]').fadeOut();
        $('.confirm').fadeIn(1500);
    });

    $('#no').click(function () {
        $('.confirm').fadeOut();
        $('form[name="edit-profile"]').fadeIn(1500);
        $('#unsubscribe').fadeIn(1500);
    });

    $('#yes').click(function () {
        window.open('/profile/delete', '_self');
    });
});

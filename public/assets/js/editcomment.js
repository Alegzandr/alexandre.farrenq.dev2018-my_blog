$(function () {
    $('form[name="edit-comment"]').submit(function () {
        $('.errors').remove();
        $('.success').remove();

        var content = $(this).find('textarea[name="content"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    $('form[name="edit-comment"]').after(
                        '<span class="success">Votre article a bien été modifié !</span>'
                    );
                }
                else {
                    if (data.content) {
                        content.after(data.content);
                    }
                    if (data.id) {
                        content.after(data.id);
                    }
                }
            }, 'json');

        return false;
    });

    // Delete choices

    $('#delete').click(function () {
        $(this).fadeOut();
        $('form[name="edit-comment"]').fadeOut();
        $('.confirm').fadeIn(1500);
    });

    $('#no').click(function () {
        $('.confirm').fadeOut();
        $('form[name="edit-comment"]').fadeIn(1500);
        $('#delete').fadeIn(1500);
    });

    $('#yes').click(function () {
        window.open('/deletecomment/' + $('input[name="id"]').val(), '_self');
    });
});

$(function () {
    $('form[name="edit-article"]').submit(function () {
        $('.errors').remove();
        $('.success').remove();

        var title = $(this).find(':text[name="title"]');
        var content = $(this).find('textarea[name="content"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    $('form[name="edit-article"]').after(
                        '<span class="success">Votre article a bien été modifié !</span>'
                    );
                }
                else {
                    if (data.title) {
                        title.after(data.title);
                    }
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
});

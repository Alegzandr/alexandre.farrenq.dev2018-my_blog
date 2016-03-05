$(function () {
    $('form[name="new-article"]').submit(function () {
        $('.errors').remove();
        $('.created').remove();

        var title = $(this).find(':text[name="title"]');
        var content = $(this).find('textarea[name="content"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    if (data.create) {
                        $('form[name="new-article"]').after(data.create);
                    }
                    else {
                        $('form[name="new-article"]').after(
                            '<span class="created">Votre article a bien été créé !</span>'
                        );
                    }
                }
                else {
                    if (data.title) {
                        title.after(data.title);
                    }
                    if (data.content) {
                        content.after(data.content);
                    }
                }
            }, 'json');

        return false;
    });
});

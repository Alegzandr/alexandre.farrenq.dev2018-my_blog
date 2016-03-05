$(function () {
    $('form[name="editarticle"]').submit(function () {
        $('.errors').remove();
        $('.edited').remove();

        var title = $(this).find(':text[name="title"]');
        var content = $(this).find('textarea[name="content"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    if (data.create) {
                        $('form[name="newarticle"]').after(data.edit);
                    }
                    else {
                        $('form[name="newarticle"]').after(
                            '<span class="edited">Votre article a bien été modifié !</span>'
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

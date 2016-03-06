$(function () {
    function formatDate(value) {
        if (value) {
            Number.prototype.padLeft = function (base, chr) {
                var len = (String(base || 10).length - String(this).length) + 1;
                return len > 0 ? new Array(len).join(chr || '0') + this : this;
            }
            var d = new Date(value),
                dformat = [d.getDate().padLeft(),
                        (d.getMonth() + 1).padLeft(),
                        d.getFullYear()].join('/') +
                    ' ' +
                    [d.getHours().padLeft(), d.getMinutes().padLeft()].join(':');
            return dformat;
        }
    }

    function loadComments() {
        $('.comment').remove();

        $.ajax({
            url: '/loadcomments',
            type: 'post',
            dataType: 'json',
            data: {id: $('input[name="article"]').val()},
            success: function (data) {
                for (var i = 9; i >= 0; i--) {
                    if (data[i]) {
                        $('.show-comments').prepend(
                            '<article class="comment-'
                            + data[i].id
                            + '"><h5><a href="/profile/'
                            + data[i].author.toLowerCase()
                            + '">'
                            + data[i].author
                            + '</a>, le '
                            + formatDate(data[i].timestamp * 1000)
                            + '</h5><p class="text">'
                            + data[i].content
                            + '</p></article>'
                        );
                        if (data.edit_timestamp !== data.timestamp) {
                            $('.comment-' + data[i].id).after('<p>(modifié)</p>');
                        }
                        if (data[i].author === 'Moi') {
                            $('.comment-' + data[i].id).after('<a href="/editcomment/'
                                + data[i].id
                                + '">Modifier le commentaire</a>'
                            );
                        }
                    }
                }
            }
        });
    }

    loadComments();

    $('#show-more').click(function () {
        $.ajax({
            url: '/loadcomments',
            type: 'post',
            dataType: 'json',
            data: {id: $('input[name="article"]').val()},
            success: function (data) {
                if (data.length >= $('article').length) {
                    var articleLength = $('article').length;
                    for (var i = articleLength; i < articleLength + 11; i++) {
                        if (data[i]) {
                            $('article').last().after(
                                '<article class="comment"><h5><a href="/profile/'
                                + data[i].author.toLowerCase()
                                + '">'
                                + data[i].author
                                + '</a>, le '
                                + formatDate(data[i].timestamp * 1000)
                                + '</h5><p class="text">'
                                + data[i].content
                                + '</p></article>'
                            );
                            if (data.edit_timestamp !== data.timestamp) {
                                $('.comment-' + data[i].id).after('<p>(modifié)</p>');
                            }
                            if (data[i].author === 'Moi') {
                                $('.comment-' + data[i].id).after('<a href="/editcomment/'
                                    + data[i].id
                                    + '">Modifier le commentaire</a>'
                                );
                            }
                        }
                    }
                }
            }
        });
    });

    $('form[name="comment"]').submit(function () {
        $('.errors').remove();
        $('.success').remove();

        var comment = $(this).find('textarea[name="comment"]');

        $.post($(this).attr('action'),
            $(this).serialize(),
            function (data) {
                if (data.valid) {
                    $('form[name="comment"]').after('<span class="success">Commentaire envoyé !</span>');
                    loadComments();
                }
                else {
                    if (data.article) {
                        comment.after(data.comment);
                    }
                    if (data.comment) {
                        comment.after(data.comment);
                    }
                }
            }, 'json');

        return false;
    });
});


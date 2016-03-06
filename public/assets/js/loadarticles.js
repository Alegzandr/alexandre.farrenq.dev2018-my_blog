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

    function limitLength(str, limit) {
        limit = typeof limit !== 'undefined' ? limit : 60;
        if (str.length > 60) {
            return str.substring(0, limit) + ' ...';
        }
        else {
            return str;
        }
    }

    $.ajax({
        url: '/load',
        type: 'get',
        dataType: 'json',
        success: function (data) {
            for (var i = 9; i >= 0; i--) {
                if (data[i]) {
                    $('main').prepend(
                        '<article><h3><a href="/article/'
                        + data[i].id
                        + '">'
                        + data[i].title
                        + '</a></h3><h4><a href="/profile/'
                        + data[i].author.toLowerCase()
                        + '">'
                        + data[i].author
                        + '</a>, le '
                        + formatDate(data[i].timestamp * 1000)
                        + '</h4><p class="text">'
                        + limitLength(data[i].content)
                        + '</p></article>'
                    );
                }
            }
        }
    });

    $('#show-more').click(function () {
        $.ajax({
            url: '/load',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('article').length) {
                    var articleLength = $('article').length;
                    for (var i = articleLength; i < articleLength + 11; i++) {
                        if (data[i]) {
                            $('article').last().after(
                                '<article><h3><a href="/article/'
                                + data[i].id
                                + '">'
                                + data[i].title
                                + '</a></h3><h4><a href="/profile/'
                                + data[i].author.toLowerCase()
                                + '">'
                                + data[i].author
                                + '</a>, le '
                                + formatDate(data[i].timestamp * 1000)
                                + '</h4><p class="text">'
                                + limitLength(data[i].content)
                                + '</p></article>'
                            );
                        }
                    }
                }
            }
        });
    });
});
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
        limit = typeof limit !== 'undefined' ? limit : 50;
        if (str.length > limit) {
            return str.substring(0, limit) + ' ...';
        }
        else {
            return str;
        }
    }

    $('#more-users').click(function () {
        $.ajax({
            url: '/loadusers',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('#users > article').length) {
                    var articleLength = $('#users > article').length -1;
                    for (var i = articleLength; i < articleLength + 10; i++) {
                        if (data[i]) {
                            $('#users > article').last().after(
                                '<article><h4><a href="/profile/'
                                + data[i].username.toLowerCase()
                                + '">'
                                + data[i].username
                                + '</a></h4></article>'
                            );
                        }
                    }
                }
            }
        });
    });

    $('#more-articles').click(function () {
        $.ajax({
            url: '/load',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('#articles > article').length) {
                    var articleLength = $('#articles > article').length -1;
                    for (var i = articleLength; i < articleLength + 10; i++) {
                        if (data[i]) {
                            $('#articles > article').last().after(
                                '<article><h3><a href="/edit/'
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

    $('#more-comments').click(function () {
        $.ajax({
            url: '/loadallcomments',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('#comments > article').length) {
                    var articleLength = $('#comments > article').length - 1;
                    for (var i = articleLength; i < articleLength + 10; i++) {
                        if (data[i]) {
                            $('#comments > article').last().after(
                                '<article><h5><a href="/profile/'
                                + data[i].author.toLowerCase()
                                + '">'
                                + data[i].author
                                + '</a>, le '
                                + formatDate(data[i].timestamp * 1000)
                                + '</h5><p class="text">'
                                + data[i].content
                                + '</p><a href="/editcomment/'
                                + data[i].id
                                + '">Modifier</a></article>'
                            );
                        }
                    }
                }
            }
        });
    });
});
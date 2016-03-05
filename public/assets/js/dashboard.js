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

    $('#more-users').click(function () {
        $.ajax({
            url: '/loadusers',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('#users > article').length) {
                    var articleLength = $('#users > article').length;
                    for (var i = articleLength; i < articleLength + 11; i++) {
                        if (data[i]) {

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
                    var articleLength = $('#articles > article').length;
                    for (var i = articleLength; i < articleLength + 11; i++) {
                        if (data[i]) {

                        }
                    }
                }
            }
        });
    });

    $('#more-comments').click(function () {
        $.ajax({
            url: '/loadcomments',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data.length >= $('#comments > article').length) {
                    var articleLength = $('#comments > article').length;
                    for (var i = articleLength; i < articleLength + 11; i++) {
                        if (data[i]) {

                        }
                    }
                }
            }
        });
    });
});
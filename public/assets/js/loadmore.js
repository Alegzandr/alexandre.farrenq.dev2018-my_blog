$(function () {
    $.ajax({
        url: '/load',
        type: 'get',
        dataType: 'json',
        success: function (data) {
            for (var i = 9; i >= 0; i--) {
                if (data[i]) {
                    $('main').prepend(
                        '<article><h3>'
                        + data[i].title
                        + '</h3><h4>'
                        + data[i].author
                        +'</h4><p class="text">'
                        + data[i].content
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
                    for (var j = articleLength; j < articleLength + 11; j++) {
                        if (data[j]) {
                            $('article').last().after(
                                '<article><h3>'
                                + data[j].title
                                + '</h3><h4>'
                                + data[j].author
                                +'</h4><p class="text">'
                                + data[j].content
                                + '</p></article>'
                            );
                        }
                    }
                }
            }
        });
    });
});
(function ($) {
    $.fn.avatarize = function (width, shape) {
        width = typeof width !== 'undefined' ? width : '32px';
        width = typeof width !== 'number' ? width : width + 'px';
        shape = typeof shape !== 'undefined' ? shape : 'square';

        this.css({
            width: width,
            height: width,
            background: 'url(\'' + $(this).attr('src') + '(\') no-repeat center'
        });

        if (shape === 'circle') {
            this.css({borderRadius: '50%'});
        }
    };
})(jQuery);

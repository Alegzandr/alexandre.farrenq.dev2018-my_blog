// Plugin by Alegzandr
// Generates random sentences for homepage

(function ($) {
    $.fn.welcome = function () {
        var sentences = [
            'Les profs les plus cools',
            'L\'école c\'est marrant maintenant',
            'Arrêtez de regarder Steam en contrôle',
            '15 ans d\'expérience'
        ];

        this.html(sentences[Math.floor(Math.random() * (sentences.length))]);
    };
})(jQuery);
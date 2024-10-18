$(document).ready(function(){
    // Smooth scroll for section links
    $('a.section-scroll').on('click', function(e) {
        var target = $(this.hash);
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 60 // Adjust offset for fixed navbar
            }, 1000);
        }
    });
});

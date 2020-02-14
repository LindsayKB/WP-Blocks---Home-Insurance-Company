jQuery(document).ready(function($) {
    $('.accordion-card-contents').on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass('show-answer');
    });
})
$(document).ready(function () {

    $(".slug-name").keyup(function () {
        $(this).closest('.row').find('.slug-url').slugify($(this));

    });



});

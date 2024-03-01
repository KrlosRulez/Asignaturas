$(document).ready(function () {

    $("div#header").load("plantillas/header.html", function() {

        $.getScript("js/header.js");

    });

    $("div#footer").load("plantillas/footer.html", function() {

        $.getScript("js/footer.js");

    });

});
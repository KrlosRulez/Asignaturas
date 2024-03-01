$(document).ready(function () {

    if (!localStorage.getItem("modo")) {

        localStorage.setItem("modo", "claro");

    }

    function cambiar_modo() {

        let css_claro = $("link[href='css/modo_claro.css']");

        let css_oscuro = $("link[href='css/modo_oscuro.css']");

        if (localStorage.getItem("modo") == "claro") {

            css_claro.attr({
                disabled: false,
            });

            css_oscuro.attr({
                disabled: true,
            });

        } else if (localStorage.getItem("modo") == "oscuro") {

            css_claro.attr({
                disabled: true,
            });

            css_oscuro.attr({
                disabled: false,
            });

        }

    }

    cambiar_modo();

    $(document).on("click", "img#cambiar-modo", function () {

        if (localStorage.getItem("modo") == "claro") {

            localStorage.setItem("modo", "oscuro");

        } else if (localStorage.getItem("modo") == "oscuro") {

            localStorage.setItem("modo", "claro");

        }

        cambiar_modo();

    });

});
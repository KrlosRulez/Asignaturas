$(document).ready(function () {

    $( document ).tooltip();

    function comprobar_sesion() {

        $.ajax({

            type: "GET",
            url: "php/comprobar_sesion.php",

            success: function (sesion_iniciada) {

                if (sesion_iniciada == true) {

                    // Mostrar Datos del Usuario

                    let id_usuario = localStorage.getItem("id-usuario");

                    $.ajax({

                        type: "GET",
                        url: "php/buscar_usuario.php",
                        data: {
                            "mostrar": "true",
                            "id_usuario": id_usuario,
                        },

                        success: function (resultado) {

                            resultado = JSON.parse(resultado);

                            $("span#nombre-usuario").append(`<span>Sesión Iniciada como ${resultado.nombre_usuario} (${resultado.nombre_rol})</span>`);

                            $("img#foto-usuario").attr({
                                "src": `img/${resultado.imagen_usuario}`,
                            });

                        },
                        error: function (xhr) {

                            alert("Atención: Se ha producido un error");

                        },

                    });

                    $("div#datos-usuario > span#cerrar-sesion").text("Cerrar Sesión");

                    $("img#foto-usuario").css({
                        "display": "block",
                    });

                } else {

                    // Mostrar link a login.html

                    $("span#nombre-usuario").append("<a href='login.html'>Iniciar Sesión</a>");

                    $("div#datos-usuario > span#cerrar-sesion").text("");

                    $("span#nombre-usuario > span").text("");

                    localStorage.removeItem("id-usuario");

                    localStorage.removeItem("nombre-usuario");

                    $("img#foto-usuario").css({
                        "display": "none",
                    });

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });



        $.ajax({

            type: "GET",
            url: "php/comprobar_usuario.php",

            success: function (sesion_iniciada) {

                if (sesion_iniciada && !location.href.includes("perfil.html")) {

                    $("a#ver-perfil").text("Ver Perfil");

                } else {

                    $("a#ver-perfil").text("");

                }

                if (sesion_iniciada && !location.href.includes("carrito.html")) {

                    $("a#carrito").text("Carrito");

                } else {

                    $("a#carrito").text("");

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });





        $.ajax({

            type: "GET",
            url: "php/comprobar_administrador.php",

            success: function (sesion_iniciada) {

                //console.log("lol");

                if (sesion_iniciada && !location.href.includes("gestion.html")) {

                    $("a#gestionar").text("Gestionar Web");

                } else {

                    $("a#gestionar").text("");

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    }

    comprobar_sesion();

    // Ocultar Enlace de Iniciar Sesión si ya estás en el Login ###

    if (location.href.includes("login.html")) {

        $("div#datos-usuario").css({
            "display": "none",
        });

    } else {

        $("div#datos-usuario").css({
            "display": "block",
        });

    }

    // ############################################################

    // Botón Cerrar Sesión ###

    $(document).on("click", "span#cerrar-sesion", function () {

        $("div#dialogo-cerrar-sesion").dialog("open");

        $(window).on("scroll", function () {

            $("div#dialogo-cerrar-sesion").dialog("option", "position", {
                my: "center", at: "center", of: window, using: function (pos) {

                    $(this).css({

                        "top": pos.top + "px" // Ajustar la posición del diálogo con el scroll

                    });

                }
            });

        });

    });

    // #######################

    // DIÁLOGOS #################

    $("div#dialogo-cerrar-sesion").dialog({

        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        draggable: false,
        position: { my: "50%", at: "50%", of: window },
        show: { effect: "drop", duration: 800, direction: "left" },
        hide: { effect: "drop", duration: 800, direction: "right" },
        buttons: {

            "Cerrar Sesión": function () {

                $.ajax({

                    type: "GET",
                    url: "php/cerrar_sesion.php",

                    success: function (resultado) {

                        $("div#dialogo-cerrar-sesion").dialog("close");

                        comprobar_sesion();

                        $("p#texto-dialogo-sesion-cerrada").text(`Hasta Pronto, ${localStorage.getItem("nombre-usuario")}!`);

                        if (!location.href.includes("perfil.html") && !location.href.includes("carrito.html") && !location.href.includes("gestion.html")) {

                            $("div#dialogo-sesion-cerrada").dialog("open");

                        } else {

                            location.href = "index.html";

                        }

                    },
                    error: function (xhr) {

                        alert("Atención: Se ha producido un error");

                    },

                });

            },

            "Cancelar": function () {

                $(this).dialog("close");

            }

        }

    });

    $("div#dialogo-sesion-cerrada").dialog({

        autoOpen: false,
        resizable: false,
        height: 100,
        width: 400,
        draggable: false,
        position: { my: "right top", at: "right-10 top+10", of: window },
        show: { effect: "drop", duration: 800, direction: "right" },
        hide: { effect: "drop", duration: 800, direction: "right" },

    });

    // ##################

});
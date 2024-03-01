$(document).ready(function () {

    if (!sessionStorage.getItem("id-detalles")) {

        sessionStorage.setItem("id-detalles", 1);   // ID por defecto

    }

    function cargar_datos(articulo_elegido) {

        let fecha_normal = new Date(articulo_elegido.fecha_lanzamiento_articulo);

        let fecha_formateada = fecha_normal.toLocaleDateString('es-ES');

        $("div#imagen-articulo > img").attr({
            src: `img/${articulo_elegido.imagen_articulo}`,
        });

        $("p#nombre-articulo").text(`${articulo_elegido.nombre_articulo}`);

        $("p#descripcion-articulo").html(`${articulo_elegido.descripcion_articulo}`);

        $("p#desarrollador-articulo").text(`Desarrollador: ${articulo_elegido.desarrollador_articulo}`);

        $("p#tipo-articulo").text(`Tipo de Artículo: ${articulo_elegido.nombre_tipo}`);

        $("p#plataforma-articulo").text(`Plataforma: ${articulo_elegido.nombre_plataforma}`);

        $("p#genero-articulo").text(`Género: ${articulo_elegido.nombre_genero}`);

        $("p#fecha-lanzamiento-articulo").text(`Fecha de lanzamiento: ${fecha_formateada}`);

        if (articulo_elegido.stock_articulo == 0) {

            $("p#stock-articulo").text(`Sin Stock`);

            $("p#stock-articulo").css({

                "color": "red",

            });

            $("button#comprar-articulo").attr({

                "disabled": true,

            });

            $("button#comprar-articulo").css({

                "background-color": "lightgrey",
                "cursor": "default",
                "color": "white",

            });

        } else if (articulo_elegido.stock_articulo == 1) {

            $("p#stock-articulo").text(`Última Unidad!`);

        } else {

            $("p#stock-articulo").text(`Quedan: ${articulo_elegido.stock_articulo}`);

        }


        $("p#precio-articulo").text(`${articulo_elegido.precio_articulo} €`);

        $("button#comprar-articulo").val(`${articulo_elegido.id_articulo}`);

        cargar_compra();

    }

    $.ajax({

        type: "GET",
        url: `php/mostrar.php`,
        data: {
            id_detalles: `${sessionStorage.getItem("id-detalles")}`,
        },
        dataType: "json",

        success: function (resultado) {

            let articulo_elegido = resultado.articulo_elegido[0];

            //console.log(articulo_elegido);

            cargar_datos(articulo_elegido);

        },
        error: function (xhr) {

            alert(xhr.statusText + xhr.responseText);

        },

    });

    function cargar_compra() {

        $("button#comprar-articulo").on("click", function () {

            let id_articulo = $(this).val();

            $.ajax({

                type: "GET",
                url: `php/comprobar_administrador.php`,

                success: function (resultado) {

                    if (resultado) {

                        $("div#dialogo-cuenta-administrador").dialog("open");

                    } else {

                        $.ajax({

                            type: "GET",
                            url: `php/comprobar_sesion.php`,

                            success: function (resultado) {

                                if (resultado) {

                                    // Añadir Compra

                                    let id_usuario = localStorage.getItem("id-usuario");

                                    //alert(`usuario con id: ${id_usuario} ha comprado el articulo con id: ${id_articulo}`);

                                    // SI NO EXISTE CREAR COMPRA, SI YA EXISTE EDITARLA

                                    $.ajax({

                                        type: "GET",
                                        url: `php/Compras.php`,
                                        data: {
                                            "id_usuario": id_usuario,
                                            "id_articulo": id_articulo,
                                            "query": `comprobar`
                                        },

                                        success: function (resultado) {

                                            console.log(resultado);

                                            if (resultado == "no existe") {

                                                console.log("Dentro de no existe");

                                                // Crear Compra

                                                $.ajax({

                                                    type: "GET",
                                                    url: `php/Compras.php`,
                                                    data: {
                                                        "id_usuario": id_usuario,
                                                        "id_articulo": id_articulo,
                                                        "query": `agregar`
                                                    },

                                                    success: function (comprado) {

                                                        //console.log(articulo_elegido);

                                                        $("div#dialogo-agregado-carrito").dialog("open");

                                                        console.log(comprado);

                                                    },
                                                    error: function (xhr) {

                                                        alert(xhr.statusText + xhr.responseText);

                                                    },

                                                });

                                            } else {

                                                console.log(resultado);

                                                // Editar Compra

                                                $.ajax({

                                                    type: "GET",
                                                    url: `php/Compras.php`,
                                                    data: {
                                                        "id_compra": resultado,
                                                        "query": `sumar`
                                                    },

                                                    success: function (actualizado) {

                                                        //console.log(articulo_elegido);

                                                        $("div#dialogo-agregado-carrito").dialog("open");

                                                        console.log(actualizado);

                                                    },
                                                    error: function (xhr) {

                                                        alert(xhr.statusText + xhr.responseText);

                                                    },

                                                });


                                            }

                                        },
                                        error: function (xhr) {

                                            alert(xhr.statusText + xhr.responseText);

                                        },

                                    });

                                } else {

                                    // Redirigir a Login

                                    $("div#dialogo-iniciar-sesion").dialog("open");

                                    $(window).on("scroll", function () {

                                        $("div#dialogo-iniciar-sesion").dialog("option", "position", {
                                            my: "center", at: "center", of: window, using: function (pos) {

                                                $(this).css({

                                                    "top": pos.top + "px" // Ajustar la posición del diálogo con el scroll

                                                });

                                            }
                                        });

                                    });

                                }

                            },
                            error: function (xhr) {

                                alert(xhr.statusText + xhr.responseText);

                            },

                        });

                    }

                },
                error: function (xhr) {

                    alert(xhr.statusText + xhr.responseText);

                },

            });



        });

    }

    $("div#dialogo-iniciar-sesion").dialog({

        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        draggable: false,
        position: { my: "50%", at: "50%", of: window },
        show: { effect: "drop", duration: 800, direction: "up" },
        hide: { effect: "drop", duration: 800, direction: "down" },
        buttons: {

            "Iniciar Sesión": function () {

                location.href = "login.html";

            },

            "Cancelar": function () {

                $(this).dialog("close");

            }

        }

    });

    $("div#dialogo-cuenta-administrador").dialog({

        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        draggable: false,
        position: { my: "50%", at: "50%", of: window },
        show: { effect: "drop", duration: 800, direction: "up" },
        hide: { effect: "drop", duration: 800, direction: "down" },
        buttons: {

            "OK": function () {

                $(this).dialog("close");

            }

        }

    });

    $("div#dialogo-agregado-carrito").dialog({

        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        draggable: false,
        position: { my: "50%", at: "50%", of: window },
        show: { effect: "drop", duration: 800, direction: "up" },
        hide: { effect: "drop", duration: 800, direction: "down" },
        buttons: {

            "OK": function () {

                $(this).dialog("close");

            },

            "Ver Carrito": function () {

                location.href = "carrito.html";

            }

        }

    });

});
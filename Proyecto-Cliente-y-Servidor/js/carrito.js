$(document).ready(function () {

    $("#dialogo-sesion-no-iniciada").dialog({

        dialogClass: "no-close",
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

                location.href = "index.html";

            }

        }

    });

    $("#dialogo-no-stock").dialog({

        dialogClass: "no-close",
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

    $("#dialogo-compra-realizada").dialog({

        dialogClass: "no-close",
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

            "Ver Compras": function () {

                location.href = "perfil.html";
                
            }

        }

    });

    function comprobar_usuario() {

        $.ajax({

            type: "GET",
            url: `php/comprobar_usuario.php`,

            success: function (sesion_iniciada) {

                if (!sesion_iniciada) {

                    $("div#dialogo-sesion-no-iniciada").dialog("open");

                    $(window).on("scroll", function () {

                        $("div#dialogo-sesion-iniciada").dialog("option", "position", {
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

    function cargar_carrito() {

        $("table#tabla-carrito > tbody").empty();

        let campos = "<tr><th>Nombre Artículo</th><th>Precio Artículo</th><th>Cantidad Artículo</th></tr>";

        $(campos).appendTo($("table#tabla-carrito > tbody"));

        $.ajax({

            type: "GET",
            url: `php/Compras.php`,
            data: {
                query: `mostrar`,
            },

            success: function (registros) {

                //console.log(registros);

                let vacio = true;

                registros = JSON.parse(registros);

                for (let registro of registros) {

                    if (registro.id_usuario == localStorage.getItem("id-usuario") && registro.estado_compra == "carrito") {

                        let nueva_fila = $("<tr>");

                        let nombre_registro = `<td>${registro.nombre_articulo}</td>`;

                        let precio_registro = `<td>${registro.precio_articulo} €</td>`;

                        let cantidad_registro = `<td>${registro.cantidad_compra}</td>`;

                        let boton_comprar = `<td><button value='${registro.id_compra}' class='comprar-articulo'>Comprar Artículo</button></td>`;

                        let boton_borrar = `<td><button value='${registro.id_compra}' class='eliminar-articulo'>Quitar Artículo</button></td>`;

                        $(nombre_registro).appendTo(nueva_fila);

                        $(precio_registro).appendTo(nueva_fila);

                        $(cantidad_registro).appendTo(nueva_fila);

                        $(boton_comprar).appendTo(nueva_fila);

                        $(boton_borrar).appendTo(nueva_fila);

                        $("table#tabla-carrito > tbody").append(nueva_fila);

                        vacio = false;

                    }

                }

                if (vacio) {

                    $("p#texto-carrito").text("Carrito Vacío");

                } else {

                    $("p#texto-carrito").text("Carrito");

                }

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    }

    comprobar_usuario();

    cargar_carrito();

    $(document).on("click", "button.comprar-articulo", function () {

        //console.log($(this).val());

        let id_compra = $(this).val();

        $.ajax({

            type: "GET",
            url: `php/Compras.php`,
            data: {
                id_compra: id_compra,
                query: `buscar`,
            },

            success: function (compra) {

                compra = JSON.parse(compra);

                compra = compra[0];

                let cantidad_compra = parseInt(compra.cantidad_compra);

                let id_articulo = compra.articulo_id;

                //console.log(cantidad_compra);

                // ########

                $.ajax({

                    type: "GET",
                    url: `php/Articulos.php`,
                    data: {
                        id_articulo: id_articulo,
                        query: `buscar`,
                    },

                    success: function (articulo) {

                        articulo = JSON.parse(articulo);

                        articulo = articulo[0];

                        let stock_articulo = parseInt(articulo.stock_articulo);

                        if (cantidad_compra > stock_articulo) {

                            // No hay suficiente stock

                            $("#dialogo-no-stock").dialog("open");

                        } else {

                            // Hay suficiente stock

                            // ==================

                            $.ajax({

                                type: "GET",
                                url: `php/Articulos.php`,
                                data: {
                                    id_articulo: id_articulo,
                                    restar_stock: cantidad_compra,
                                    query: `bajar_stock`,
                                },

                                success: function (articulo) {

                                    // Se ha restado el stock

                                    // $$$$$$$$$$$$$$$$$$$


                                    $.ajax({

                                        type: "GET",
                                        url: `php/Compras.php`,
                                        data: {
                                            id_compra: id_compra,
                                            query: `cambiar_a_comprado`,
                                        },

                                        success: function (articulo) {

                                            $("#dialogo-compra-realizada").dialog("open");

                                            cargar_carrito();

                                        },
                                        error: function (xhr) {

                                            alert(xhr.statusText + xhr.responseText);

                                        },

                                    });

                                    // $$$$$$$$$$$$$$$$$$$

                                },
                                error: function (xhr) {

                                    alert(xhr.statusText + xhr.responseText);

                                },

                            });

                            // ==================

                        }

                    },
                    error: function (xhr) {

                        alert(xhr.statusText + xhr.responseText);

                    },

                });

                // ########

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

        // ##############

        // $.ajax({

        //     type: "GET",
        //     url: `php/Compras.php`,
        //     data: {
        //         id_compra: $(this).val(),
        //         query: `cambiar_a_comprado`,
        //     },

        //     success: function (resultado) {

        //         //console.log("Articulo eliminado del Carrito");

        //     },
        //     error: function (xhr) {

        //         alert(xhr.statusText + xhr.responseText);

        //     },

        // });

        cargar_carrito();

    });

    $(document).on("click", "button.eliminar-articulo", function () {

        //console.log($(this).val());

        $.ajax({

            type: "GET",
            url: `php/Compras.php`,
            data: {
                id_compra: $(this).val(),
                query: `borrar`,
            },

            success: function (resultado) {

                //console.log("Articulo eliminado del Carrito");

                cargar_carrito();

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    });

});
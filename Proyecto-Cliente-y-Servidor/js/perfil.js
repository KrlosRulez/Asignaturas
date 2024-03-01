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

    function cargar_compras() {

        $("table#tabla-compras > tbody").empty();

        let campos = "<tr><th>Nombre Artículo</th><th>Precio Artículo</th><th>Cantidad Artículo</th></tr>";

        $(campos).appendTo($("table#tabla-compras > tbody"));

        $.ajax({

            type: "GET",
            url: `php/Compras.php`,
            data: {
                query: `mostrar`,
            },

            success: function (registros) {

                //console.log(registros);

                registros = JSON.parse(registros);

                for (let registro of registros) {

                    if (registro.id_usuario == localStorage.getItem("id-usuario") && registro.estado_compra == "comprado") {

                        let nueva_fila = $("<tr>");

                        let nombre_registro = `<td>${registro.nombre_articulo}</td>`;

                        let precio_registro = `<td>${registro.precio_articulo} €</td>`;

                        let cantidad_registro = `<td>${registro.cantidad_compra}</td>`;
                    
                        $(nombre_registro).appendTo(nueva_fila);

                        $(precio_registro).appendTo(nueva_fila);

                        $(cantidad_registro).appendTo(nueva_fila);

                        $("table#tabla-compras > tbody").append(nueva_fila);

                    }

                }

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    }

    comprobar_usuario();

    cargar_compras();

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

                //alert("Articulo eliminado");

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

        cargar_compras();

    });

    function cargar_foto_usuario() {

        $.ajax({

            type: "GET",
            url: `php/Usuarios.php`,
            data: {
                id_usuario: localStorage.getItem("id-usuario"),
                query: `buscar`,
            },
    
            success: function (resultado) {
    
                resultado = JSON.parse(resultado);
    
                resultado = resultado[0]
    
                //console.log(resultado.imagen_usuario);
    
                $("img#imagen-usuario").attr({
                    src: `img/${resultado.imagen_usuario}`,
                });

                $("img#foto-usuario").attr({
                    src: `img/${resultado.imagen_usuario}`,
                });
    
            },
            error: function (xhr) {
    
                alert(xhr.statusText + xhr.responseText);
    
            },
    
        });

    }

    cargar_foto_usuario();

    // Modificar imagen de usuario (la imagen se borra del servidor si ni la usa ningún otro usuario)

    $("button#modificar-imagen").on("click", function (event) {

        event.preventDefault();

        var formData = new FormData($("#form-editar-foto")[0]);

        $.ajax({

            type: "POST",
            url: `php/subir_foto.php`,
            data: formData,
            contentType: false,
            processData: false,

            success: function (foto_nueva) {

                $.ajax({

                    type: "GET",
                    url: `php/Usuarios.php`,
                    data: {
                        id_usuario: localStorage.getItem("id-usuario"),
                        query: 'buscar',
                    },

                    success: function (resultado) {

                        resultado = JSON.parse(resultado);

                        resultado = resultado[0];

                        //console.log("Usuarios > buscar");

                        let foto_antigua = resultado.imagen_usuario;

                        if (foto_nueva != "No hay imagen") {

                            $("p#error-imagen").text("");

                            $.ajax({

                                type: "GET",
                                url: `php/Usuarios.php`,
                                data: {
                                    id_usuario: localStorage.getItem("id-usuario"),
                                    nombre_foto: foto_nueva,
                                    query: 'cambiar_foto',
                                },

                                success: function (resultado) {

                                    //console.log("Usuarios > cambiar_foto");

                                    $.ajax({

                                        type: "GET",
                                        url: `php/Usuarios.php`,
                                        data: {
                                            nombre_foto: foto_antigua,
                                            query: 'buscar_foto',
                                        },

                                        success: function (usada) {

                                            //console.log(usada);

                                            if (usada == "true") {

                                                //console.log("Hay mas usuarios con este avatar");

                                            } else {

                                                //console.log(usada);

                                                //console.log("Borrar imagen del server");

                                                $.ajax({

                                                    type: "GET",
                                                    url: `php/eliminar_foto.php`,
                                                    data: {
                                                        nombre_foto: foto_antigua,
                                                    },

                                                    success: function (resultado) {

                                                        //console.log("eliminar_foto.php");

                                                    },
                                                    error: function (xhr) {

                                                        alert(xhr.statusText + xhr.responseText);

                                                    }

                                                });

                                            }

                                        },
                                        error: function (xhr) {

                                            alert(xhr.statusText + xhr.responseText);

                                        },

                                    });

                                    cargar_foto_usuario();

                                },
                                error: function (xhr) {

                                    alert(xhr.statusText + xhr.responseText);

                                },

                            });

                        } else {

                            $("p#error-imagen").text("Ninguna imagen seleccionada");

                        }

                    },
                    error: function (xhr) {

                        alert(xhr.statusText + xhr.responseText);

                    }

                });

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    });

    // Modificar Contraseña

    $("button#modificar-password").on("click", function () {

        const RegExPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$()#€!%*?&+])[A-Za-z\d@$()#€!%*?&+]{8,}$/;

        let input_password = $("input#nueva-password").val();

        let repetir_password = $("input#repetir-password").val();

        let valido = true;

        if (!RegExPassword.test(input_password)) {

            $("p#error-password").text("Mín 8 Car, 1 Min, 1 May, 1 Esp, 1 Núm.");

            valido = false;

        } else {

            $("p#error-password").text("");

        }

        if (repetir_password != input_password) {

            $("p#error-repetir-password").text("Las contraseñas no coinciden");

            valido = false;

        } else {

            $("p#error-repetir-password").text("");

        }

        if (valido) {

            console.log("cambiar contraseña");

            $.ajax({

                type: "GET",
                url: `php/Usuarios.php`,
                data: {
                    id_usuario: localStorage.getItem("id-usuario"),
                    nueva_password: input_password,
                    query: `cambiar_password`,
                },
        
                success: function (resultado) {
        
                    console.log(resultado);

                    $("p#password-cambiada").text("Contraseña Cambiada!");

                    if (localStorage.getItem("password-usuario")) {

                        localStorage.setItem("password-usuario", input_password);

                    }
        
                },
                error: function (xhr) {
        
                    alert(xhr.statusText + xhr.responseText);
        
                },
        
            });

        }

    });

    

});
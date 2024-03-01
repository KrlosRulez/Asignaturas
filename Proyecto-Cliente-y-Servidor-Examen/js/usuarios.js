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

    function comprobar_administrador() {

        $.ajax({

            type: "GET",
            url: `php/comprobar_administrador.php`,

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

    comprobar_administrador();

    var id_usuario_eliminar = 0;

    var id_usuario_editar = 0;

    // Limitar texto descripción

    // Cargar Usuarios en la tabla

    function cargar_usuarios() {

        $.ajax({

            type: "GET",
            url: "php/Usuarios.php",
            data: {
                "query": "mostrar",
            },

            success: function (resultado) {

                resultado = JSON.parse(resultado);

                //console.log(resultado);

                $("table#tabla-usuarios > tbody").empty();

                let nombres_campos = "<tr><th>Nombre</th><th>Correo</th><th>Contraseña</th><th>Rol</th><td colspan='2'><button class='formulario-agregar'>Agregar Usuario</button></td></tr>";

                $("table#tabla-usuarios > tbody").append(nombres_campos);

                for (let usuario of resultado) {

                    if (usuario.id_usuario != localStorage.getItem("id-usuario")) {

                        //console.log(usuario.nombre_usuario);

                        let nueva_fila = $("<tr>");

                        let nombre_usuario = `<td>${usuario.nombre_usuario}</td>`;

                        let correo_usuario = `<td>${usuario.correo_usuario}</td>`;

                        let password_usuario = `<td>${usuario.password_usuario}</td>`;

                        let rol_usuario = `<td>${usuario.nombre_rol}</td>`;

                        let boton_editar = `<td><button class="editar-usuario" value="${usuario.id_usuario}">Editar Usuario</button></td>`;

                        let boton_borrar = `<td><button class="eliminar-usuario" value="${usuario.id_usuario}">Borrar Usuario</button></td>`;

                        $(nombre_usuario).appendTo(nueva_fila);

                        $(correo_usuario).appendTo(nueva_fila);

                        $(password_usuario).appendTo(nueva_fila);

                        $(rol_usuario).appendTo(nueva_fila);

                        $(boton_editar).appendTo(nueva_fila);

                        $(boton_borrar).appendTo(nueva_fila);

                        $("table#tabla-usuarios > tbody").append(nueva_fila);

                    }

                }

                cargar_listeners_borrar();

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    }

    cargar_usuarios();

    function cargar_datos_formulario() {

        $.ajax({

            type: "GET",
            url: "php/Usuarios.php",
            data: {
                "query": "mostrar_roles",
            },

            success: function (roles) {

                roles = JSON.parse(roles);

                for (let rol of roles) {

                    let nuevo_rol = $("<option>");

                    nuevo_rol.text(`${rol.nombre_rol}`);

                    nuevo_rol.val(`${rol.id_rol}`);

                    $("select#select-rol").append(nuevo_rol);

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    }

    cargar_datos_formulario();

    $(document).on("click", "button.formulario-agregar", function () {

        $("button#boton-enviar").val("Agregar");

        $("button#boton-enviar").text("Agregar Usuario");

        $("#dialogo-formulario").dialog("open");

    });

    $(document).on("click", "button.editar-usuario", function () {

        $("button#boton-enviar").val("Editar");

        $("button#boton-enviar").text("Editar Usuario");

        id_usuario_editar = $(this).val();

        // Cargar datos del Usuario a editar

        $.ajax({

            type: "GET",
            url: "php/Usuarios.php",
            data: {
                id_usuario: $(this).val(),
                "query": "buscar",
            },

            success: function (resultado) {

                resultado = JSON.parse(resultado);

                resultado = resultado[0];

                //console.log(resultado);

                $("#input-nombre").val(resultado.nombre_usuario);

                $("#input-correo").val(resultado.correo_usuario);

                $("#select-rol").val(resultado.rol_id);

                $("#dialogo-formulario").dialog("open");

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    });

    // Diálogo Formulario

    $("#dialogo-formulario").dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
    });

    // Diálogo Confirmar Eliminar

    $("div#dialogo-confirmar-eliminar").dialog({

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

            "Eliminar": function () {

                let dialogo = $(this);

                $.ajax({

                    type: "GET",
                    url: "php/Usuarios.php",
                    data: {
                        id_usuario: id_usuario_eliminar,
                        query: "eliminar",
                    },

                    success: function (resultado) {

                        dialogo.dialog("close");

                        cargar_usuarios();

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

    // Agregar o Editar Usuario $$$$$$$$$$$

    $(document).on("click", "button#boton-enviar", function () {

        const RegExCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        const RegExPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$()#€!%*?&+])[A-Za-z\d@$()#€!%*?&+]{8,}$/;    

        let nuevo_nombre = $("#input-nombre").val();

        let nuevo_correo = $("#input-correo").val();

        let nueva_password = $("#input-password").val();

        let repetir_password = $("#input-repetir-password").val();

        let nuevo_rol = $("#select-rol").val();

        let valido = true;

        $("div#dialogo-formulario > input").each(function (e) {

            if ($(this).val() == "") {

                valido = false;

            }

        });

        if (!RegExCorreo.test(nuevo_correo)) {

            valido = false;

            $("p#error-correo").text("- Introduce un correo válido");

        } else {

            $("p#error-correo").text("");

        }

        if (!RegExPassword.test(nueva_password)) {

            valido = false;

            $("p#error-password").text("- Mín 8 Car, 1 Min, 1 May, 1 Esp, 1 Núm.");

        } else {

            $("p#error-password").text("");

        }
 
        //console.log("repetir_password: " + repetir_password);

        //console.log("nueva_password: " + nueva_password);

        if (repetir_password != nueva_password) {

            valido = false;

            $("p#error-repetir-password").text("- Las Contraseñas no coinciden");

        } else {

            $("p#error-repetir-password").text("");

        }

        if (valido) {

            $("p#datos-no-validos").text("");

            if ($(this).val() == "Agregar") {

                // Agregar Usuario

                $.ajax({

                    type: "GET",
                    url: "php/Usuarios.php",
                    data: {
                        nombre_usuario: nuevo_nombre,
                        correo_usuario: nuevo_correo,
                        password_usuario: nueva_password,
                        rol_id: nuevo_rol,
                        "query": "agregar_rol",
                    },

                    success: function (resultado) {

                        //console.log(resultado);

                        if (resultado == "Ambos en Uso") {

                            $("p#error-nombre").text("Nombre en Uso");

                            $("p#error-correo").text("Correo ya Registrado");

                        } else if (resultado == "Correo ya Registrado") {

                            $("p#error-nombre").text("");

                            $("p#error-correo").text("Correo ya Registrado");

                        } else if (resultado == "Nombre en Uso") {

                            $("p#error-nombre").text("Nombre en Uso");

                            $("p#error-correo").text("");

                        } else {

                            $("p#error-nombre").text("");

                            $("p#error-correo").text("");

                            cargar_usuarios();

                            $("#dialogo-formulario").dialog("close");

                            $("#input-nombre").val("");

                            $("#input-correo").val("");
                
                            $("#input-password").val("");
                
                            $("#input-repetir-password").val("");
                
                            $("#select-rol").val(1);

                        }
                        
                    },
                    error: function (xhr) {

                        alert("Atención: Se ha producido un error");

                    },

                });

            } else if ($(this).val() == "Editar") {

                // Editar Usuario

                $.ajax({

                    type: "GET",
                    url: "php/Usuarios.php",
                    data: {
                        id_usuario: id_usuario_editar,
                        nombre_usuario: nuevo_nombre,
                        correo_usuario: nuevo_correo,
                        password_usuario: nueva_password,
                        rol_id: nuevo_rol,
                        "query": "editar",
                    },

                    success: function (resultado) {

                        console.log(resultado);

                        cargar_usuarios();

                        $("#dialogo-formulario").dialog("close");

                        $("#input-nombre").val("");

                        $("#input-correo").val("");
            
                        $("#input-password").val("");
            
                        $("#input-repetir-password").val("");
            
                        $("#select-rol").val(1);

                    },
                    error: function (xhr) {

                        alert("Atención: Se ha producido un error");

                    },

                });

            }

        } else {

            $("p#datos-no-validos").text("- Los datos deben ser válidos");

        }

    });

    // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

    // Eliminar Usuario

    function cargar_listeners_borrar() {

        $(document).on("click", "button.eliminar-usuario", function () {

            //console.log("lol");

            id_usuario_eliminar = $(this).val();

            $("div#dialogo-confirmar-eliminar").dialog("open");

        });

    }

});
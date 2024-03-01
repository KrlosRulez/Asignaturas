$(document).ready(function () {

    // COMPROBAR SESIÓN AL ENTRAR EN LA PÁGINA ############################################################################################

    $("div#dialogo-sesion-iniciada").dialog({

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

    $.ajax({

        type: "GET",
        url: "php/comprobar_sesion.php",

        success: function (sesion_iniciada) {

            if (sesion_iniciada == true) {

                // console.log("Sesión Iniciada: " + sesion_iniciada);

                $("div#dialogo-sesion-iniciada").dialog("open");

                $(window).on("scroll", function() {

                    $("div#dialogo-sesion-iniciada").dialog("option", "position", { my: "center", at: "center", of: window, using: function(pos) {
                    
                        $(this).css({

                            "top": pos.top + "px" // Ajustar la posición del diálogo con el scroll
                    
                        });

                    }});

                });

            }

        },

        error: function (xhr) {

            alert("Atención: Se ha producido un error");

        },

    });

    // ####################################################################################################################################

    // Variables

    const RegExCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    const RegExPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$()#€!%*?&+])[A-Za-z\d@$()#€!%*?&+]{8,}$/;

    var correo_valido = false;

    var nombre_valido = false;

    var password_valida = false;

    var password_repetida = false;

    var recordar_usuario = false;   // Utilizar luego

    // COMPROBAR SI HABIA SESIÓN GUARDADA #################################################################################################

    function comprobar_recordar () {

        if (localStorage.getItem("correo-usuario") && localStorage.getItem("password-usuario")) {

            recordar_usuario = true;
    
            $("input#input-correo").val(localStorage.getItem("correo-usuario"));
    
            $("input#input-password").val(localStorage.getItem("password-usuario"));
    
            $("input[name='recordar']").attr({
    
                "checked": true,
    
            });
    
            correo_valido = true;
    
            password_valida = true;
    
        }

    }

    comprobar_recordar();

    // ####################################################################################################################################


    // FUNCIÓN PARA MOSTRAR O DESHABILITAR EL BOTÓN DEL FORMULARIO ########################################################################

    function mostrar_boton() {

        let val_button = $("button#enviar-form").val();

        if (((val_button == "iniciar-sesion") && (!correo_valido || !password_valida)) ||
            ((val_button == "registrarse") && (!correo_valido || !nombre_valido || !password_valida || !password_repetida))) {

            $("button#enviar-form").attr({
                "disabled": true,
            });

            if ($("button#enviar-form").hasClass("valido")) {

                $("button#enviar-form").removeClass("valido");

            }

            $("button#enviar-form").addClass("no-valido");

        } else {

            $("button#enviar-form").attr({
                "disabled": false,
            });

            if ($("button#enviar-form").hasClass("no-valido")) {

                $("button#enviar-form").removeClass("no-valido");

            }

            $("button#enviar-form").addClass("valido");

        }

    }

    // ####################################################################################################################################

    // LISTENER CORREO ###################################################################################################################

    $("input#input-correo").on("input", function () {

        if (!RegExCorreo.test($(this).val())) {

            correo_valido = false;

            $("p#error-correo").text("- Introduce una dirección de correo válida.");

        } else {

            correo_valido = true;

            $("p#error-correo").text("");

        }

        mostrar_boton();

    });

    // ####################################################################################################################################

    // LISTENERS PASSWORD #################################################################################################################

    $("input#input-password").on("input", function () {

        if (!RegExPassword.test($(this).val())) {

            password_valida = false;

            $("p#error-password").text("- Mín. 8 caracteres, 1 Mayús, 1 Minús, 1 Núm, 1 Caracter Esp.");

        } else {

            password_valida = true;

            $("p#error-password").text("");

        }

        mostrar_boton();

    });

    $("input#input-password").on("focusin", function () {

        if (!RegExPassword.test($(this).val())) {

            password_valida = false;

        } else {

            password_valida = true;

        }

        mostrar_boton();

    });

    // ####################################################################################################################################

    // LISTENER NOMBRE ####################################################################################################################

    $("input#input-nombre").on("input", function () {

        if ($(this).val().length > 12) {

            nombre_valido = false;

            $("p#error-nombre").text("- Máx. 12 caracteres.");

        } else {

            nombre_valido = true;

            $("p#error-nombre").text("");

        }

        mostrar_boton();

    });

    // ####################################################################################################################################

    // LISTENER REPETIR PASSWORD ##########################################################################################################

    $("input#input-repetir-password").on("input", function () {

        if ($(this).val() != $("input#input-password").val()) {

            password_repetida = false;

            $("p#error-repetir-password").text("- Las Contraseñas no coinciden.");

        } else {

            password_repetida = true;

            $("p#error-repetir-password").text("");

        }

        mostrar_boton();

    });

    // ####################################################################################################################################


    mostrar_boton();

    // BOTÓN INICIAR SESIÓN / REGISTRARSE #################################################################################################

    $("button#enviar-form").on("focusin", function () {

        mostrar_boton();

    });

    $("button#enviar-form").on("click", function () {

        let correo_usuario = $("input#input-correo").val();

        let password_usuario = $("input#input-password").val();

        // Iniciar Sesión

        if ($(this).val() == "iniciar-sesion") {

            $.ajax({

                type: "GET",
                url: "php/buscar_usuario.php",
                data: {
                    "correo_usuario": correo_usuario,
                    "password_usuario": password_usuario,
                },

                success: function (resultado) {

                    if (resultado == "null") {

                        $("input#input-password").val("");

                        $("input#input-password").focus();

                        $("p#error-password").text("Correo o Contraseña Incorrectos");

                    } else {

                        //console.log("este pavo existe");

                        resultado = JSON.parse(resultado);

                        // Crear Sesión

                        $.ajax({

                            type: "GET",
                            url: "php/crear_sesion.php",
                            data: {
                                "id_usuario": resultado.id_usuario,
                                "nombre_usuario": resultado.nombre_usuario,
                                "nombre_rol": resultado.nombre_rol,
                            },

                            success: function (creado) {

                                // Guardar datos en sessionStorage para usarlos en index.html

                                localStorage.setItem("id-usuario", creado);

                                localStorage.setItem("nombre-usuario", resultado.nombre_usuario);

                                location.href = "index.html";

                                if (recordar_usuario) {

                                    localStorage.setItem("correo-usuario", correo_usuario);
                    
                                    localStorage.setItem("password-usuario", password_usuario);
                    
                                } else {
                                    
                                    if (localStorage.getItem("correo-usuario") && localStorage.getItem("password-usuario")) {
                    
                                        localStorage.removeItem("correo-usuario");
                    
                                        localStorage.removeItem("password-usuario");
                    
                                    }
                    
                                }

                            },

                            error: function (xhr) {

                                alert("Atención: Se ha producido un error");

                            },

                        });

                    }

                },

                error: function (xhr) {

                    alert("Atención: Se ha producido un error");

                },

            });

        } else if ($(this).val() == "registrarse") {

            let nombre_usuario = $("input#input-nombre").val();

            $.ajax({

                type: "GET",
                url: "php/Usuarios.php",
                data: {
                    "correo_usuario": correo_usuario,
                    "nombre_usuario": nombre_usuario,
                    "password_usuario": password_usuario,
                    "query": "agregar"
                },

                success: function (resultado) {

                    console.log(resultado);

                    if (resultado == "Ambos en Uso") {

                        $("p#error-correo").text("Correo ya Registrado");

                        $("p#error-nombre").text("Nombre en Uso");

                    } else if (resultado == "Correo ya Registrado") {

                        $("p#error-correo").text(resultado);

                    } else if (resultado == "Nombre en Uso") {

                        $("p#error-nombre").text(resultado);

                    } else {

                        $("p#tipo-formulario").text("Iniciar Sesión");

                        $(".mostrar-registro").each(function () {

                            $(this).removeClass("mostrar-registro");

                            $(this).addClass("ocultar-registro");

                        });

                        $("div#contenedor-recordar").css({
                            "display": "block",
                        });

                        $(this).text("No tienes una cuenta? Crea Una!");

                        $(this).val("login");

                        $("button#enviar-form").val("iniciar-sesion");

                        $("button#enviar-form").text("Iniciar Sesión");

                        $("input#input-nombre").val("");

                        $("p#error-nombre").text("");

                        nombre_valido = false;

                        $("input#input-password").val("");

                        $("p#error-password").text("");

                        password_valida = false;

                        $("input#input-repetir-password").val("");

                        $("p#error-repetir-password").text("");

                        password_repetida = false;
                        
                        mostrar_boton();

                    }

                },

                error: function (xhr) {

                    alert("Atención: Se ha producido un error");

                },

            });

        }

        // Registrarse 

    });

    // ####################################################################################################################################

    // BOTÓN RECORDAR USUARIO #############################################################################################################

    $("input#recordar-usuario").on("click", function () {

        if ($(this).is(":checked")) {

            recordar_usuario = true;

        } else {

            recordar_usuario = false;

        }

    });

    // ####################################################################################################################################

    // CAMBIAR TIPO DE FORMULARIO #########################################################################################################

    $("button#cambiar-form").on("click", function () {

        let form_actual = $(this).val();

        if (form_actual == "registro") {

            $("p#tipo-formulario").text("Iniciar Sesión");

            $(".mostrar-registro").each(function () {

                $(this).removeClass("mostrar-registro");

                $(this).addClass("ocultar-registro");

            });

            $("div#contenedor-recordar").css({
                "display": "block",
            });

            $(this).text("No tienes una cuenta? Crea Una!");

            $(this).val("login");

            if ($("p#error-correo").text() == "Correo ya Registrado") {

                $("p#error-correo").text("");

            }

            $("button#enviar-form").val("iniciar-sesion");

            $("button#enviar-form").text("Iniciar Sesión");

            $("input#input-nombre").val("");

            $("p#error-nombre").text("");

            nombre_valido = false;

            $("input#input-password").val("");

            $("p#error-password").text("");

            password_valida = false;

            $("input#input-repetir-password").val("");

            $("p#error-repetir-password").text("");

            password_repetida = false;

            comprobar_recordar();

        } else if (form_actual == "login") {

            $("p#tipo-formulario").text("Registrarse");

            $(".ocultar-registro").each(function () {

                $(this).removeClass("ocultar-registro");

                $(this).addClass("mostrar-registro");

            });

            $("div#contenedor-recordar").css({
                "display": "none",
            });

            $(this).text("Ya tienes cuenta? Inicia Sesión!");

            $(this).val("registro");

            $("button#enviar-form").val("registrarse");

            $("button#enviar-form").text("Registrarse");

            $("input#input-password").val("");

            $("p#error-password").text("");

            password_valida = false;

        }

        $("button#enviar-form").focus();

    });

    // ####################################################################################################################################

});
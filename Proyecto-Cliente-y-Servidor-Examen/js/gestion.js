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

    var id_articulo_eliminar = 0;

    var id_articulo_editar = 0;

    var nombre_foto_eliminar = "";

    // Limitar texto descripción

    function limitar_descripciones() {

        $(".descripcion-articulo").each(function (e) {

            if ($(this).text().length > 40) {

                $(this).text(`${$(this).text().substring(0, 40)}...`);

            }

        });

    }

    limitar_descripciones();

    // Cargar Artículos en la tabla

    function cargar_articulos() {

        $.ajax({

            type: "GET",
            url: "php/Articulos.php",
            data: {
                "query": "mostrar",
            },

            success: function (resultado) {

                resultado = JSON.parse(resultado);

                //console.log(resultado);

                $("table#tabla-articulos > tbody").empty();

                let nombres_campos = "<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Stock</th><th>F. Lanzamiento</th><th>Desarrollador</th><th>Tipo</th><th>Plataforma</th><th>Género</th><td colspan='2'><button class='formulario-agregar'>Agregar Artículo</button></td></tr>";

                $("table#tabla-articulos > tbody").append(nombres_campos);

                for (let articulo of resultado) {

                    let nueva_fila = $("<tr>");

                    let nombre_articulo = `<td>${articulo.nombre_articulo}</td>`;

                    let descripcion_articulo = `<td class='descripcion-articulo'>${articulo.descripcion_articulo}</td>`;

                    let precio_articulo = `<td>${articulo.precio_articulo}</td>`;

                    let imagen_articulo = `<td>${articulo.imagen_articulo}</td>`;

                    let stock_articulo = `<td>${articulo.stock_articulo}</td>`;

                    let fecha_lanzamiento_articulo = `<td>${articulo.fecha_lanzamiento_articulo}</td>`;

                    let desarrollador_articulo = `<td>${articulo.desarrollador_articulo}</td>`;

                    let tipo_articulo = `<td>${articulo.nombre_tipo}</td>`;

                    let plataforma_articulo = `<td>${articulo.nombre_plataforma}</td>`;

                    let genero_articulo = `<td>${articulo.nombre_genero}</td>`;

                    let boton_editar = `<td><button class="editar-articulo" value="${articulo.id_articulo}">Editar Artículo</button></td>`;

                    let boton_borrar = `<td><button class="eliminar-articulo" value="${articulo.id_articulo}">Borrar Artículo</button></td>`;

                    $(nombre_articulo).appendTo(nueva_fila);

                    $(descripcion_articulo).appendTo(nueva_fila);

                    $(precio_articulo).appendTo(nueva_fila);

                    $(imagen_articulo).appendTo(nueva_fila);

                    $(stock_articulo).appendTo(nueva_fila);

                    $(fecha_lanzamiento_articulo).appendTo(nueva_fila);

                    $(desarrollador_articulo).appendTo(nueva_fila);

                    $(tipo_articulo).appendTo(nueva_fila);

                    $(plataforma_articulo).appendTo(nueva_fila);

                    $(genero_articulo).appendTo(nueva_fila);

                    $(boton_editar).appendTo(nueva_fila);

                    $(boton_borrar).appendTo(nueva_fila);

                    $("table#tabla-articulos > tbody").append(nueva_fila);

                }

                limitar_descripciones();

                cargar_listeners_borrar();

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    }

    cargar_articulos();

    function cargar_datos_formulario() {

        $.ajax({

            type: "GET",
            url: "php/Articulos.php",
            data: {
                "query": "mostrar_tipos",
            },

            success: function (tipos) {

                tipos = JSON.parse(tipos);

                for (let tipo of tipos) {

                    let nuevo_tipo = $("<option>");

                    nuevo_tipo.text(`${tipo.nombre_tipo}`);

                    nuevo_tipo.val(`${tipo.id_tipo}`);

                    $("select#select-tipo").append(nuevo_tipo);

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

        $.ajax({

            type: "GET",
            url: "php/Articulos.php",
            data: {
                "query": "mostrar_plataformas",
            },

            success: function (plataformas) {

                plataformas = JSON.parse(plataformas);

                for (let plataforma of plataformas) {

                    let nueva_plataforma = $("<option>");

                    nueva_plataforma.text(`${plataforma.nombre_plataforma}`);

                    nueva_plataforma.val(`${plataforma.id_plataforma}`);

                    $("select#select-plataforma").append(nueva_plataforma);

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

        $.ajax({

            type: "GET",
            url: "php/Articulos.php",
            data: {
                "query": "mostrar_generos",
            },

            success: function (generos) {

                generos = JSON.parse(generos);

                for (let genero of generos) {

                    let nuevo_genero = $("<option>");

                    nuevo_genero.text(`${genero.nombre_genero}`);

                    nuevo_genero.val(`${genero.id_genero}`);

                    $("select#select-genero").append(nuevo_genero);

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

        $("button#boton-enviar").text("Agregar Artículo");

        $("#dialogo-formulario").dialog("open");

    });

    $(document).on("click", "button.editar-articulo", function () {

        $("button#boton-enviar").val("Editar");

        $("button#boton-enviar").text("Editar Artículo");

        id_articulo_editar = $(this).val();

        // Cargar datos del Artículo a editar

        $.ajax({

            type: "GET",
            url: "php/Articulos.php",
            data: {
                id_articulo: $(this).val(),
                "query": "buscar",
            },

            success: function (resultado) {

                resultado = JSON.parse(resultado);

                resultado = resultado[0];

                //console.log(resultado);

                $("#input-nombre").val(resultado.nombre_articulo);

                $("#input-descripcion").val(resultado.descripcion_articulo);
        
                $("#input-precio").val(resultado.precio_articulo);
        
                $("#input-imagen").val(resultado.imagen_articulo);
        
                $("#input-stock").val(resultado.stock_articulo);
        
                $("#input-fecha").val(resultado.fecha_lanzamiento_articulo);
        
                $("#input-desarrollador").val(resultado.desarrollador_articulo);
        
                $("#select-tipo").val(resultado.tipo_id);
        
                $("#select-plataforma").val(resultado.plataforma_id);
        
                $("#select-genero").val(resultado.genero_id);

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

    $("#dialogo-formulario-img").dialog({
        autoOpen: false,
        height: 250,
        width: 400,
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
                    url: "php/Articulos.php",
                    data: {
                        id_articulo: id_articulo_eliminar,
                        query: "eliminar",
                    },

                    success: function (resultado) {

                        dialogo.dialog("close");

                        cargar_articulos();

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

    $("div#dialogo-confirmar-eliminar-img").dialog({

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
                    url: "php/eliminar_foto.php",
                    data: {
                        nombre_foto: nombre_foto_eliminar,
                    },

                    success: function (resultado) {

                        dialogo.dialog("close");

                        cargar_imagenes();

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

    // Agregar o Editar Artículo $$$$$$$$$$$

    $(document).on("click", "button#boton-enviar", function () {

        let nuevo_nombre = $("#input-nombre").val();

        let nueva_descripcion = $("#input-descripcion").val();

        let nuevo_precio = parseFloat($("#input-precio").val());

        let nueva_imagen = $("#input-imagen").val();

        let nuevo_stock = parseInt($("#input-stock").val());

        let nueva_fecha = $("#input-fecha").val();

        let nuevo_desarrollador = $("#input-desarrollador").val();

        let nuevo_tipo = $("#select-tipo").val();

        let nueva_plataforma = $("#select-plataforma").val();

        let nuevo_genero = $("#select-genero").val();

        let valido = true;

        $("div#dialogo-formulario > input").each(function (e) {

            if ( ( $(this).val() == "" ) || ( (e == 1 || e == 3) && ( parseFloat($(this).val()) < 0 ) ) ) {

                valido = false;

            }

        });

        if (valido) {

            $("p#datos-no-validos").text("");

            if ($(this).val() == "Agregar") {

                // Agregar Artículo

                $.ajax({

                    type: "GET",
                    url: "php/Articulos.php",
                    data: {
                        nombre_articulo: nuevo_nombre,
                        descripcion_articulo: nueva_descripcion,
                        precio_articulo: nuevo_precio,
                        imagen_articulo: nueva_imagen,
                        stock_articulo: nuevo_stock,
                        fecha_lanzamiento_articulo: nueva_fecha,
                        desarrollador_articulo: nuevo_desarrollador,
                        id_tipo: nuevo_tipo,
                        id_plataforma: nueva_plataforma,
                        id_genero: nuevo_genero,
                        "query": "agregar",
                    },
        
                    success: function (resultado) {
        
                        cargar_articulos();

                        $("#dialogo-formulario").dialog("close");
        
                    },
                    error: function (xhr) {
        
                        alert("Atención: Se ha producido un error");
        
                    },
        
                });

            } else if ($(this).val() == "Editar") {
    
                // Editar Artículo
    
                $.ajax({

                    type: "GET",
                    url: "php/Articulos.php",
                    data: {
                        id_articulo: id_articulo_editar,
                        nombre_articulo: nuevo_nombre,
                        descripcion_articulo: nueva_descripcion,
                        precio_articulo: nuevo_precio,
                        imagen_articulo: nueva_imagen,
                        stock_articulo: nuevo_stock,
                        fecha_lanzamiento_articulo: nueva_fecha,
                        desarrollador_articulo: nuevo_desarrollador,
                        id_tipo: nuevo_tipo,
                        id_plataforma: nueva_plataforma,
                        id_genero: nuevo_genero,
                        "query": "editar",
                    },
        
                    success: function (resultado) {
        
                        cargar_articulos();

                        $("#dialogo-formulario").dialog("close");
        
                    },
                    error: function (xhr) {
        
                        alert("Atención: Se ha producido un error");
        
                    },
        
                });

            }

            $("#input-nombre").val("");

            $("#input-descripcion").val("");
    
            $("#input-precio").val("");
    
            $("#input-imagen").val("");
    
            $("#input-stock").val("");
    
            $("#input-fecha").val("");
    
            $("#input-desarrollador").val("");
    
            $("#select-tipo").val(1);
    
            $("#select-plataforma").val(1);
    
            $("#select-genero").val(1);

        } else {

            $("p#datos-no-validos").text("- Los datos deben ser válidos");

        }

    });

    // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

    // Eliminar Artículo

    function cargar_listeners_borrar() {

        $(document).on("click", "button.eliminar-articulo", function () {

            //console.log("lol");

            id_articulo_eliminar = $(this).val();
    
            $("div#dialogo-confirmar-eliminar").dialog("open");
    
        });

    }

    // #####################################################################################
    // #####################################################################################
    // ######################### IMÁGENES ##################################################
    // #####################################################################################
    // #####################################################################################

    function cargar_imagenes() {

        $("table#tabla-imagenes > tbody").empty();

        let nombres_campos = `<tr><th>Imagen</th><th>Nombre Imagen</th><th><button id="agregar-foto">Agregar Imagen</button></th></tr>`;

        $(nombres_campos).appendTo($("table#tabla-imagenes > tbody"));

        $.ajax({

            type: "GET",
            url: "php/cargar_imagenes.php",

            success: function (imagenes) {

                imagenes = JSON.parse(imagenes);

                // console.log(imagenes);

                for (let i = 2; i < imagenes.length; i++) {

                    //console.log(imagenes[i]);

                    let nueva_fila = $("<tr>");

                    let imagen = `<td><img src='img/${imagenes[i]}' /></td>`;

                    let nombre_imagen = `<td>${imagenes[i]}</td>`;

                    let boton_eliminar = `<td><button class='eliminar-foto' value='${imagenes[i]}'>Eliminar Foto</button></td>`;

                    $(imagen).appendTo(nueva_fila);

                    $(nombre_imagen).appendTo(nueva_fila);

                    $(boton_eliminar).appendTo(nueva_fila);

                    nueva_fila.appendTo($("table#tabla-imagenes > tbody"));

                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        }); 

    }

    cargar_imagenes();

    $(document).on("click", "button#agregar-foto", function () {

        $("button#boton-enviar-img").val("Agregar");

        $("button#boton-enviar-img").text("Agregar Foto");

        $("#dialogo-formulario-img").dialog("open");

    });

    $("button#boton-enviar-img").on("click", function (event) {

        event.preventDefault();

        var formData = new FormData($("#form-img")[0]);

        $.ajax({

            type: "POST",
            url: `php/subir_foto.php`,
            data: formData,
            contentType: false,
            processData: false,

            success: function (resultado) {

                if (resultado == "No hay imagen") {

                    $("p#datos-no-validos-img").text("Ninguna Imagen Seleccionada");

                } else {

                    $("p#datos-no-validos-img").text("");

                    $("#dialogo-formulario-img").dialog("close");

                    cargar_imagenes();

                }

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    });

    $(document).on("click", "button.eliminar-foto", function () {

        nombre_foto_eliminar = $(this).val();

        $("#dialogo-confirmar-eliminar-img").dialog("open");

    });

    // #####################################################################################
    // #####################################################################################
    // #####################################################################################
    // #####################################################################################
    // #####################################################################################

    $("span#ver-articulos").on("click", function () {

        $("div#gestionar-articulos").css({
            display: "block",
        });

        $("div#gestionar-imagenes").css({
            display: "none",
        });

    });

    $("span#ver-imagenes").on("click", function () {

        $("div#gestionar-articulos").css({
            display: "none",
        });

        $("div#gestionar-imagenes").css({
            display: "block",
        });

    });

});
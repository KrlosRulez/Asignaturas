$(document).ready(function () {

    var id_producto_editar = 0;

    function cargar_productos() {

        let tabla = $("#tabla-productos > tbody");

        tabla.empty();

        $.ajax({

            type: "GET",
            url: `php/Products.php`,
            data: {
                query: `mostrar`,
            },

            success: function (registros) {

                registros = JSON.parse(registros);

                let nombres_campos = `<th>ID</th><th>Nombre</th><th>Marca</th><th>Descripción</th><th>Editar</th><th>Eliminar</th>`;

                tabla.append(nombres_campos);

                for (let registro of registros) {

                    let nueva_fila = $("<tr>");

                    let id_producto = `<td>${registro.id_product}</td>`;

                    let nombre_producto = `<td>${registro.name}</td>`;

                    let marca_producto = `<td>${registro.brand}</td>`;

                    let descripcion_producto = `<td>${registro.description}</td>`;

                    let boton_editar = `<td><button class='btn-editar' value='${registro.id_product}'>Editar Producto</button></td>`;

                    let boton_eliminar = `</td><button class='btn-eliminar' value='${registro.id_product}'>Eliminar Producto</button></td>`;

                    $(id_producto).appendTo(nueva_fila);

                    $(nombre_producto).appendTo(nueva_fila);

                    $(marca_producto).appendTo(nueva_fila);

                    $(descripcion_producto).appendTo(nueva_fila);

                    $(boton_editar).appendTo(nueva_fila);

                    $(boton_eliminar).appendTo(nueva_fila);

                    $(nueva_fila).appendTo(tabla);

                }

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    }

    cargar_productos();

    $("button#agregar-producto").on("click", function () {

        $("button#enviar-form").val("agregar");

        $("button#enviar-form").text("Añadir Producto");

        $("form#form").css({
            "display": "block",
        });

    });

    $(document).on("click", "button.btn-editar", function () {

        id_producto_editar = $(this).val();

        $.ajax({

            type: "GET",
            url: `php/Products.php`,
            data: {
                id_product: id_producto_editar,
                query: `mostrar_id`,
            },

            success: function (resultado) {

                resultado = JSON.parse(resultado);

                resultado = resultado[0];

                console.log(resultado);

                $("#input-nombre").val(resultado.name);

                $("#input-marca").val(resultado.brand);

                $("#input-descripcion").val(resultado.description);

                $("button#enviar-form").val("editar");

                $("button#enviar-form").text("Editar Producto");

                $("form#form").css({
                    "display": "block",
                });

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    });

    $("button#enviar-form").on("click", function () {

        let nuevo_nombre = $("#input-nombre").val();

        let nueva_marca = $("#input-marca").val();

        let nueva_descripcion = $("#input-descripcion").val();

        if ($(this).val() == "agregar") {

            $.ajax({

                type: "GET",
                url: `php/Products.php`,
                data: {
                    name: nuevo_nombre,
                    brand: nueva_marca,
                    description: nueva_descripcion,
                    query: `agregar`,
                },

                success: function (resultado) {

                    cargar_productos();

                    alert(resultado);

                },
                error: function (xhr) {

                    alert(xhr.statusText + xhr.responseText);

                },

            });

        } else if ($(this).val() == "editar") {

            $.ajax({

                type: "GET",
                url: `php/Products.php`,
                data: {
                    id_product: id_producto_editar,
                    name: nuevo_nombre,
                    brand: nueva_marca,
                    description: nueva_descripcion,
                    query: `editar`,
                },

                success: function (resultado) {

                    cargar_productos();

                    alert(resultado);

                },
                error: function (xhr) {

                    alert(xhr.statusText + xhr.responseText);

                },

            });

        }

    });

    $(document).on("click", "button.btn-eliminar", function () {

        let id_producto_eliminar = $(this).val();

        $.ajax({

            type: "GET",
            url: `php/Products.php`,
            data: {
                id_product: id_producto_eliminar,
                query: `eliminar`,
            },

            success: function (resultado) {

                cargar_productos();

                alert(resultado);

            },
            error: function (xhr) {

                alert(xhr.statusText + xhr.responseText);

            },

        });

    });

});
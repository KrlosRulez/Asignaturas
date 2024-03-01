$(document).ready(function () {

    var plataforma = null;

    var tipo = null;

    var genero = null;

    var precio_maximo = null;

    function pintar_articulo(articulo) {

        let nuevo_articulo = $("div.tarjeta:last").clone();

        nuevo_articulo.css({
            "display": "block",
        });

        nuevo_articulo.find("div.imagen-tarjeta > img").attr({
            "src": `img/${articulo.imagen_articulo}`,
        });

        nuevo_articulo.find("p.nombre-tarjeta").text(articulo.nombre_articulo);
        nuevo_articulo.find("p.plataforma-tarjeta").text(articulo.nombre_plataforma);
        nuevo_articulo.find("p.tipo-tarjeta").text(articulo.nombre_tipo);

        if (articulo.stock_articulo == 0) {

            nuevo_articulo.find("p.stock-tarjeta").text(`Sin Stock`);

        } else if (articulo.stock_articulo == 1) {

            nuevo_articulo.find("p.stock-tarjeta").text(`Última Unidad!`);

        } else {

            nuevo_articulo.find("p.stock-tarjeta").text(`Quedan: ${articulo.stock_articulo}`);

        }

        nuevo_articulo.find("p.precio-tarjeta").text(`${articulo.precio_articulo} €`);

        nuevo_articulo.find("a.detalles-tarjeta").text(`Ver`);

        nuevo_articulo.find("a.detalles-tarjeta").val(`${articulo.id_articulo}`);

        nuevo_articulo.find("a.detalles-tarjeta").attr({
            "href": `detalles.html`,
        });

        $("div#contenedor-tarjetas").append(nuevo_articulo);

    }

    function pintar_plataforma(plataforma_x) {

        let nueva_plataforma = $("li.item-plataforma:last").clone();

        if (plataforma_x.id_plataforma == plataforma) {

            nueva_plataforma.css({
                "color": "dodgerblue",
            });

        }

        nueva_plataforma.css({
            "display": "block",
        });

        nueva_plataforma.text(`- ${plataforma_x.nombre_plataforma}`);

        nueva_plataforma.attr({
            "value": plataforma_x.id_plataforma,
        });

        $("ul#lista-plataformas").append(nueva_plataforma);

    }

    function pintar_tipo(tipo_x) {

        let nuevo_tipo = $("li.item-tipo:last").clone();

        if (tipo_x.id_tipo == tipo) {

            nuevo_tipo.css({
                "color": "dodgerblue",
            });

        }

        nuevo_tipo.css({
            "display": "block",
        });

        nuevo_tipo.text(`- ${tipo_x.nombre_tipo}`);

        nuevo_tipo.attr({
            "value": tipo_x.id_tipo,
        });

        $("ul#lista-tipos").append(nuevo_tipo);

    }

    function pintar_genero(genero_x) {

        let nuevo_genero = $("li.item-genero:last").clone();

        if (genero_x.id_genero == genero) {

            nuevo_genero.css({
                "color": "dodgerblue",
            });

        }

        nuevo_genero.css({
            "display": "block",
        });

        nuevo_genero.text(`- ${genero_x.nombre_genero}`);

        nuevo_genero.attr({
            "value": genero_x.id_genero,
        });

        $("ul#lista-generos").append(nuevo_genero);

    }

    function cargar_datos(filtro_plataforma, filtro_tipo, filtro_genero, filtro_precio) {

        let hay_articulos = false;

        $.ajax({

            type: "GET",
            url: "php/mostrar.php",
            dataType: "json",

            success: function (resultado) {

                borrar_articulos();

                let articulos = resultado.articulos;
                let plataformas = resultado.plataformas;
                let tipos = resultado.tipos;
                let generos = resultado.generos;

                // Filtros ########################

                let plataforma_filtrada = [];

                let tipo_filtrado = [];

                let genero_filtrado = [];

                let articulos_filtrados = [];

                let filtrar_plataforma = (articulo) => {return articulo.plataforma_id == filtro_plataforma};
                
                let filtrar_tipo = (articulo) => {return articulo.tipo_id == filtro_tipo};

                let filtrar_genero = (articulo) => {return articulo.genero_id == filtro_genero};

                let filtrar_precio = (articulo) => {return articulo.precio_articulo <= parseFloat(filtro_precio)};

                filtro_plataforma == null ? plataforma_filtrada = [...articulos] : plataforma_filtrada = articulos.filter(filtrar_plataforma);

                filtro_tipo == null ? tipo_filtrado = [...plataforma_filtrada] : tipo_filtrado = plataforma_filtrada.filter(filtrar_tipo);

                filtro_genero == null ? genero_filtrado = [...tipo_filtrado] : genero_filtrado = tipo_filtrado.filter(filtrar_genero);

                filtro_precio == null ? articulos_filtrados = [...genero_filtrado] : articulos_filtrados = genero_filtrado.filter(filtrar_precio);

                for (let articulo of articulos_filtrados) {

                    hay_articulos = true;

                    pintar_articulo(articulo);

                }

                // ################################

                $("div.tarjeta:last").css({
                    "display": "none",
                });

                $("ul#lista-plataformas").empty();

                for (let plataforma of plataformas) {

                    pintar_plataforma(plataforma);

                }

                $("li.item-plataforma:last").css({
                    "display": "none",
                });

                $("ul#lista-tipos").empty();

                for (let tipo of tipos) {

                    pintar_tipo(tipo);

                }

                $("li.item-tipo:last").css({
                    "display": "none",
                });

                $("ul#lista-generos").empty();

                for (let genero of generos) {

                    pintar_genero(genero);

                }

                $("li.item-genero:last").css({
                    "display": "none",
                });

                // Mostrar Mensaje si ningún juego cumple los filtros

                if (!hay_articulos) {

                    //console.log("lol");
        
                    let p_aviso = $("<p>", {
                        id: "aviso-vacio",
                        text: "No hay Artículos que cumplan los filtros",
                    });
        
                    $("div#contenedor-tarjetas").append(p_aviso);
        
                }

            },
            error: function (xhr) {

                alert("Atención: Se ha producido un error");

            },

        });

    }

    cargar_datos(null, null, null, null);

    function borrar_articulos() {

        $("div#contenedor-tarjetas").empty();

    }

    // Filtro Plataforma

    $("ul#lista-plataformas").on("click", "li.item-plataforma", function () {

        borrar_articulos();

        plataforma = $(this).val();

        cargar_datos(plataforma, tipo, genero, precio_maximo);

    });

    $("ul#lista-tipos").on("click", "li.item-tipo", function () {

        borrar_articulos();

        tipo = $(this).val();

        cargar_datos(plataforma, tipo, genero, precio_maximo);

    });

    $("ul#lista-generos").on("click", "li.item-genero", function () {

        borrar_articulos();

        genero = $(this).val();

        cargar_datos(plataforma, tipo, genero, precio_maximo);

    });

    $("button#filtrar-precio-maximo").on("click", function () {

        borrar_articulos();

        if ($("input[name='input-precio-maximo']").val() != "") {

            precio_maximo = $("input[name='input-precio-maximo']").val();

        } else {
            
            precio_maximo = null;

        }
        
        cargar_datos(plataforma, tipo, genero, precio_maximo);

    });

    $("button#eliminar-filtros").on("click", function () {

        borrar_articulos();

        plataforma = null;

        tipo = null;

        genero = null;

        precio_maximo = null;

        $("input[name='input-precio-maximo']").val("");

        cargar_datos(plataforma, tipo, genero, precio_maximo);

    });

    $("div#contenedor-tarjetas").on("click", "a.detalles-tarjeta", function () {

        sessionStorage.setItem("id-detalles", $(this).val());

    });

});
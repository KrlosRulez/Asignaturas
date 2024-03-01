function borrar_usuario_js (id_usuario, nombre_usuario) {

    if (confirm(`¿Deseas borrar el usuario "${nombre_usuario}"?`)) {

        location.href = `Usuarios.php?Borrar=${id_usuario}`;

    }

}

function borrar_libro_js (id_libro, nombre_libro, imagen) {

    if (confirm(`¿Deseas borrar el libro "${nombre_libro}"?`)) {

        location.href = `Libros.php?Borrar=${id_libro}&Imagen=${imagen}`;

    }

}

function borrar_categoria_js (id_categoria, nombre_categoria) {

    if (confirm(`¿Deseas borrar la categoría "${nombre_categoria}"?`)) {

        location.href = `Categorias.php?Borrar=${id_categoria}`;

    }

}
// Eliminar Imagen

function eliminar_imagen_js (album, imagen) {

    if (confirm(`¿Deseas eliminar la imagen: ${imagen}?`) == true) {

        location.href = `index.php?eliminar_imagen&album=${album}&imagen=${imagen}`;

    }

}

// Renombrar Imagen

function renombrar_imagen_js (album, imagen) {

    if (confirm(`¿Deseas renombrar la imagen ${imagen}?`) == true) {

        var nuevo_nombre = prompt("Introduce el nuevo nombre de la imagen", imagen);

        location.href = `index.php?renombrar_imagen&album=${album}&imagen=${imagen}&nuevo_nombre=${nuevo_nombre}`;

    }

}

// Mover Imagen

function mover_imagen_js (album, imagen, nuevo_album) {

    if (confirm(`¿Deseas mover la imagen ${imagen} a ${nuevo_album}?`)) {

        location.href = `index.php?mover_imagen_ok&album=${album}&imagen=${imagen}&nuevo_album=${nuevo_album}`;

    }

}

// Cambiar nombre del álbum

function cambiar_album_js (album) {

    if (confirm(`¿Deseas cambiar el nombre de: ${album}?`)) {

        var nuevo_nombre = prompt("Introduce el nuevo nombre del álbum", album);

        location.href = `index.php?cambiar_album&album=${album}&nuevo_nombre=${nuevo_nombre}`;

    }

}

// Eliminar álbum

function eliminar_album_js (album) {

    if (confirm(`¿Deseas eliminar el álbum: ${album}?`)) {

        location.href = `index.php?eliminar_album&album=${album}`;

    }

}
// Función JS para eliminar fotos

function eliminar(album, imagen) {

    if (confirm(`¿Deseas eliminar la imagen: ${imagen}?`) == true) {

        location.href=`index.php?eliminar&album=${album}&img=${imagen}`;

    }

}

// Función JS para renombrar la imagen de álbum

function renombrar_imagen(album, imagen) {

    if (confirm(`¿Deseas cambiar el nombre a la imagen: ${imagen}?`) == true) {

        var nuevo_nombre = prompt("Escribe el nuevo nombre de la imagen", imagen);

        location.href=`index.php?renombrar&album=${album}&img=${imagen}&nuevo_nombre=${nuevo_nombre}`;

    }

}

// Función JS para renombrar un álbum

function renombrar_album(nombre_album) {

    if (confirm(`¿Deseas cambiar el nombre al álbum: ${nombre_album}?`) == true) {

        var nuevo_nombre = prompt("Escribe el nuevo nombre del álbum", nombre_album);

        location.href=`index.php?cambiar_album&album=${nombre_album}&nuevo_nombre=${nuevo_nombre}`;

    }

}

// Función JS para eliminar un álbum

function eliminar_album(album) {
    
    if (confirm(`¿Deseas eliminar el álbum: ${album}?`) == true) {

        location.href=`index.php?eliminar_album&album=${album}`;

    }

}

// Función JS para avisar al usuario

function aviso_eliminar() {

    alert("No se puede borrar el álbum porque no está vacío");

}

// Función JS para cambiar imagen de álbum

function mover_imagen(nuevo_album, imagen, album_actual) {
                
    if (confirm(`¿Deseas mover la imagen: ${imagen} a ${nuevo_album}?`) == true) {

        location.href=`index.php?mover&album=${album_actual}&nuevo_album=${nuevo_album}&img=${imagen}`;

    }

}
function eliminar_album_js (album) {

    if (confirm(`¿Deseas eliminar el álbum ${album}?`)) {

        location.href = `index.php?eliminar_album_ok&album=${album}`;

    }

}
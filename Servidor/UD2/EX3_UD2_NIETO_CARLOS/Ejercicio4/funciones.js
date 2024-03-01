function renombrar_js (album, imagen, nuevo_nombre) {

    if (confirm(`¿Deseas cambiar el nombre de "${imagen}" por "${nuevo_nombre}"?`)) {
        
        location.href = `index.php?renombrar_ok&album=${album}&imagen=${imagen}&nuevo_nombre=${nuevo_nombre}`;

    }

}
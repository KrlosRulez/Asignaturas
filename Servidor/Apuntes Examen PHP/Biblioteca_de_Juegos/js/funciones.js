function confirmar_borrar_genero (id, nombre) {

    if (confirm(`¿Deseas eliminar el género ${nombre}?`)) {

        location.href = `Generos.php?Eliminar=${id}`;

    }

}
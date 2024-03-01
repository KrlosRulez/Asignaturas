<table border="1">

    <tr>
        <td>ID Libro</td>
        <td>Título</td>
        <td>Categoría</td>
        <td>Precio</td>
    </tr>

    <?php foreach ($libros as $libro): ?>

        <tr>

            <td>
                <?= esc($libro['id_libro']) ?>
            </td>
            <td>
                <?= esc($libro['titulo']) ?>
            </td>
            <td>
                <?= esc($libro['categoria']) ?>
            </td>
            <td>
                <?= esc($libro['precio']) ?>
            </td>

        </tr>

    <?php endforeach ?>

</table>
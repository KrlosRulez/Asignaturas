<table border="1">

    <tr>
        <td>ID Categoría</td>
        <td>Categoría</td>
    </tr>

    <?php foreach ($categorias as $categoria): ?>

    <tr>

        <td>
            <?= esc($categoria['id_categoria']) ?>
        </td>
        <td>
            <?= esc($categoria['categoria']) ?>
        </td>

    </tr>

    <?php endforeach ?>

</table>
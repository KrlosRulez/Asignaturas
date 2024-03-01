<?php require("../check_session.php"); ?>

<?php //session_start(); ?>

<?php if (isset($_SESSION["admin"])) { ?>

    <h2>Bienvenido,
        <?php echo $_SESSION["admin"]; ?>!
        <a href="../index.php?no_session">Cerrar Sesión.</a>
    </h2>


<?php } ?>

<h2>
    <a href="productos.php">Productos</a>&nbsp;&nbsp;
    <a href="marcas.php">Marcas</a>&nbsp;&nbsp;
    <a href="modelos.php">Modelos</a>&nbsp;&nbsp;
</h2>
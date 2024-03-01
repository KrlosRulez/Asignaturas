<?php require("check_session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Trade+Winds&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Don Carlos</title>
    <link rel="stylesheet" href="css/menu.css" />
</head>
<body>

    <?php 

    session_start();

    if (isset($_GET['aviso'])) {

        echo '<p class="error">No tienes privilegios para acceder a esta página</p>';

    }
    
    if (isset($_SESSION['admin'])) {
    ?>

        <p class="mensaje">Sesión Iniciada como Administrador. <a href="index.php?no_session">Cerrar Sesión</a></p>

    <?php
    } else if (isset($_SESSION['super'])) {
    ?>

        <p class="mensaje">Sesión Iniciada como SuperUsuario. <a href="index.php?no_session">Cerrar Sesión</a></p>

    <?php
    } else if (isset($_SESSION['user'])) {
    ?>

        <p class="mensaje">Sesión Iniciada como Usuario Estándar. <a href="index.php?no_session">Cerrar Sesión</a></p>

    <?php
    }
    
    ?>

    <div id="contenedor">
        <h1>Tablas <span>de</span> Krlos</h1>
        <?php if (isset($_SESSION['admin'])) { ?>
        <a href="Usuarios.php">Tabla de Usuarios</a>
        <?php } ?>
        <a href="Categorias.php">Tabla de Categorías</a>
        <a href="Libros.php">Tabla de Libros</a>
    </div>

</body>
</html>
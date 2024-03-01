<?php require("check_admin.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Trade+Winds&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/Usuarios.css" />
    <script src="js/funciones.js"></script>
</head>

<body>

    <?php

    include("menu.php");

    require("CRUD_Usuarios.php");

    require("R_Roles.php");

    $dataBaseRoles = new Roles();

    $roles = $dataBaseRoles->showRoles();

    $dataBase = new Usuarios();

    if (isset($_POST['agregar'])) {

        $nombre = $_POST['usuario'];

        $password = md5($_POST['password']);

        $rol = $_POST['rol'];

        $dataBase->addUsuario($nombre, $password, $rol);

        header("location:Usuarios.php");

    }

    if (isset($_POST['editar'])) {

        $id = $_POST['id_usuario'];

        $nombre = $_POST['usuario'];

        $password = md5($_POST['password']);

        $rol = $_POST['rol'];

        $dataBase->editUsuario($id, $nombre, $password, $rol);

        header("location:Usuarios.php");

    }

    if (isset($_GET['Borrar'])) {

        $id_borrar = $_GET['Borrar'];

        $dataBase->deleteUsuario($id_borrar);

        header("location:Usuarios.php");

    }

    ?>

    <h2 class="nombre">Tabla de Usuarios</h2>

    <?php if (isset($_GET['Agregar'])) { ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <span>Nombre del Usuario:</span> <input type="text" name="usuario">&nbsp;&nbsp;
            <span>Contraseña:</span> <input type="password" name="password">&nbsp;&nbsp;
            <span>Rol:</span> 
            <select name="rol">
                <?php foreach ($roles as $rol) { ?>
                    <option value="<?php echo $rol["id_rol"]; ?>"><?php echo $rol["nombre_rol"]; ?></option>
                <?php } ?>
            </select>&nbsp;&nbsp;
            <input class="submit" type="submit" name="agregar" value="Añadir">

        </form>

        <br />

    <?php } else { ?>

        <?php if (isset($_SESSION['admin'])) { ?>

        <div class="agregar">
            <h3>
                <a href="Usuarios.php?Agregar">
                    <div>+</div> Añadir Usuario
                </a>
            </h3>
        </div>

        <?php } ?>

    <?php } ?>



    <?php if (isset($_POST['Editar'])) { ?>

        <h3 class="form">Editar Usuario</h3>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="hidden" name="id_usuario" value="<?php echo $_POST['id_usuario']; ?>">
            <span>Nombre del Usuario:</span> <input type="text" name="usuario" value="<?php echo $_POST['usuario']; ?>">&nbsp;&nbsp;
            <span>Contraseña:</span> <input type="password" name="password">&nbsp;&nbsp;
            <span>Rol:</span> 
            <select name="rol">
                <?php foreach ($roles as $rol) { ?>
                    <option value="<?php echo $rol["id_rol"]; ?>" <?php if ($rol["id_rol"] == $_POST["rol"]) {?> selected <?php } ?>>
                        <?php echo $rol["nombre_rol"]; ?>
                    </option>
                <?php } ?>
            </select>&nbsp;&nbsp;
            <input class="submit" type="submit" name="editar" value="Editar">

        </form>

        <br />

    <?php } ?>

    <?php

    $users = $dataBase->showUsuarios();

    ?>

    <table border="1">

        <tr>
            <td>ID Usuario</td>
            <td>Nombre</td>
            <td>Contraseña</td>
            <td>Rol</td>
            <?php if (isset($_SESSION['admin'])) { ?>
            <td>Editar</td>
            <td>Borrar</td>
            <?php } ?>
        </tr>

        <?php foreach ($users as $user) { ?>

            <tr>
                <td>
                    <?php echo $user["id_usuario"]; ?>
                </td>
                <td>
                    <?php echo $user["usuario"]; ?>
                </td>
                <td>
                    <?php echo $user["password"]; ?>
                </td>
                <td>
                    <?php echo $user["nombre_rol"]; ?>
                </td>
                <?php if (isset($_SESSION['admin'])) { ?>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo $user["id_usuario"]; ?>">
                        <input type="hidden" name="usuario" value="<?php echo $user["usuario"]; ?>">
                        <input type="hidden" name="password" value="<?php echo $user["password"]; ?>">
                        <input type="hidden" name="rol" value="<?php echo $user["rol"]; ?>">
                        <input class="submit" type="submit" name="Editar" value="Editar">
                    </form>
                </td>
                <td>
                    <button class="submit" onclick="borrar_usuario_js('<?php echo $user['id_usuario']; ?>', '<?php echo $user['usuario']; ?>')">
                        Borrar
                    </button>  
                </td>
                <?php } ?>
            </tr>

        <?php } ?>

    </table>

</body>

</html>
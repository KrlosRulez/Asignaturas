<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla de Usuarios</title>
    </head>

    <?php require("CRUD/CRUD_Usuarios.php"); ?>

    <?php require("CRUD/R_Roles.php"); ?>

    <?php include("menu.php"); ?>

    <body>

        <?php 
        
        $dataBase = new Usuarios();

        $usuarios = $dataBase->showUsuarios();

        $databaseRoles = new Roles();

        $roles = $databaseRoles->showRoles();

        ?>

        <h2 class="nombre">Tabla de Usuarios</h2>

        <!-- AGREGAR USUARIO -->

        <?php if (isset($_GET['Agregar'])) { ?>

            <!-- Mostrar formulario de agregar -->

            <h3>Agregar Usuario</h3>

            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

                Nombre: <input type="text" name="nombre"><br /><br />

                Contraseña: <input type="password" name="contraseña"><br /><br />

                Rol:
                <select name="rol">

                    <?php foreach ($roles as $rol) { ?>

                        <option value="<?php echo $rol[0]; ?>">
                            <?php echo $rol[1]; ?>
                        </option>

                    <?php } ?>

                </select>

                <input type="submit" name="boton-agregar" value="Agregar Usuario">

            </form>

            <br />

        <?php } else { ?>

            <!-- Mostrar enlace para abrir formulario -->

            <a href="Usuarios.php?Agregar">Agregar Usuario</a>

            <br /><br />

        <?php } ?>

        <?php 

        if (isset($_POST['boton-agregar'])) {

            $input_nombre = $_POST['nombre'];

            $input_contraseña = md5($_POST['contraseña']);

            $input_rol = $_POST['rol'];

            $data = [$input_nombre, $input_contraseña, $input_rol];

            $dataBase->addUsuario($data);

            header('location:Usuarios.php');

        } 

        ?>

        <!-- FIN AGREGAR USUARIO -->

        <!-- BORRAR USUARIO -->



        <!-- FIN BORRAR USUARIO  -->

        <!-- MODIFICAR USUARIO -->



        <!-- FIN MODIFICAR USUARIO -->

        <!-- TABLA -->

        <table border="1">
            
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Contraseña</td>
                <td>Rol</td>
            </tr>

            <?php foreach ($usuarios as $usuario) { ?>

                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['contraseña']; ?></td>
                    <td><?php echo $usuario['rol']; ?></td>
                </tr>

            <?php } ?>

        </table>

        <!-- FIN TABLA -->

    </body>
</html>
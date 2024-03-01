<?php

class Conexion {

    private $server = "localhost";
    private $user = "root";
    private $password = "bbdd";
    private $bbdd = "BD_products";

    public function getConexion () {

        return $conexion = new mysqli(
            $this->server, 
            $this->user, 
            $this->password, 
            $this->bbdd
        );

    }

    public function cerrarConexion ($conexion) {

        $conexion->close();

    }

}
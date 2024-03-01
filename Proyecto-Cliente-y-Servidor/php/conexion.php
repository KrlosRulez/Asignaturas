<?php

class Conexion {

    private $server = "localhost";
    private $user = "tela";
    private $password = "darkusbakugan";
    private $bbdd = "cnf_proyecto";

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
<?php

require_once("clsDatos.php");

class clsUsuario {

    private $codigo;
    private $login;
    private $nombre;
    private $apellido;
    private $pass;

    public function __construct($codigo, $login, $nombre, $apellido, $pass) {
        $this->codigo = $codigo;
        $this->login = $login;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pass = $pass;
    }

    public function __destruct() {
        
    }

    public function get_codigo() {
        return $this->codigo;
    }

    public function get_login() {
        return $this->login;
    }

    public function get_nombre() {
        return $this->nombre;
    }

    public function get_apellido() {
        return $this->apellido;
    }

    public function get_pass() {
        return $this->pass;
    }

    public function buscar() {
        $encontro = false;
        $objDatos = new clsDatos();
        $sql = "select * from usuario where(usu_cod='$this->codigo')";
        $datos_desordenados = $objDatos->filtro($sql);

        if ($columna == $objDatos->proximo($datos_desordenados)) {

            $this->codigo = $columna['usu_cod'];
            $this->login = $columna['usu_login'];
            $this->nombre = $columna['usu_nombre'];
            $this->apellido = $columna['usu_apellido'];
            $this->pass = $columna['usu_password'];
            $encontro = true;
        }
        $objDatos->cerrarfiltro($datos_desordenados);
        $objDatos->cerrarconexion();
        return $encontro;
    }

    public function incluir() {
        $objDatos = new clsDatos();
        $sql = "insert into usuario(usu_cod,usu_login,usu_nombre,usu_apellido,usu_password) 
        values ('$this->codigo','$this->login','$this->nombre','$this->apellido','$this->pass')";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }

    public function modificar() {
        $objDatos = new clsDatos();
        $sql = "update usuario set usu_login='$this->login', usu_nombre='$this->nombre', usu_apellido='$this->apellido', usu_password='$this->pass'' where(usu_codigo='$this->codigo')";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }

    public function eliminar() {
        $objDatos = new clsDatos();
        $sql = "delete from usurio where(usu_codigo='$this->codigo')";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }
}

?>
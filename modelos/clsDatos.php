<?php

class clsDatos {

    private $conexion;

    public function __construct() {
        $servidor = "localhost";
        $usuario = "root";
        $clave = "gta666666";
        $base = "poodb";

        $this->conexion = mysql_connect($servidor, $usuario, $clave);
        mysql_select_db($base, $this->conexion);
    }

    public function __destruct() {
        
    }

    public function filtro($slq) {
        $result = mysql_query($slq, $this->conexion);
        return $result;
    }

    public function cerrarfiltro($datos) {

        mysql_free_result($datos);
    }

    public function proximo($datos) {

        $arreglo = mysql_fetch_array($datos);

        return $arreglo;
    }

    public function ejecutar($sql) {
        mysql_query($sql, $this->conexion);
    }

    public function cerrarconexion() {

        mysql_close($this->conexion);
    }

    function fechabd($pcFecha) {
        $lcNow = "now()";

        if (strlen($pcFecha) == 10) {
            $lcDia = substr($pcFecha, 0, 2);
            $lcMes = substr($pcFecha, 3, 2);
            $lcAno = substr($pcFecha, 6, 4);

            $lcNow = $lcAno . "-" . $lcMes . "-" . $lcDia;
        }
        return $lcNow;
    }

}

?>
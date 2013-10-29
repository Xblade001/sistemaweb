<?php

require_once("clsDatos.php");

class clsBarrio {

    private $codigo;
    private $descripcion;

    public function __construct($codigo, $descripcion) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
    }

    public function __destruct() {
        
    }

    public function get_codigo() {
        return $this->codigo;
    }

    public function get_descripcion() {
        return $this->descripcion;
    }

    public function buscar() {
        $encontro = false;
        $objDatos = new clsDatos();
        $sql = "select * from barrio where bar_codigo='$this->codigo'";
        $datos_desordenados = $objDatos->filtro($sql);

        if ($columna = $objDatos->proximo($datos_desordenados)) {

            $this->codigo = $columna['bar_codigo'];
            $this->descripcion = $columna['bar_descrip'];
            $encontro = true;
        }
        $objDatos->cerrarfiltro($datos_desordenados);
        $objDatos->cerrarconexion();
        return $encontro;
    }

    public function incluir() {
        $objDatos = new clsDatos();
        $sql = "insert into barrio(bar_codigo,bar_descrip) 
        values ('$this->codigo','$this->descripcion')";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }

    public function modificar() {
        $objDatos = new clsDatos();
        $sql = "update barrio set bar_descrip='$this->descripcion' where bar_codigo='$this->codigo'";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }

    public function eliminar() {
        $objDatos = new clsDatos();
        $sql = "delete from barrio where bar_codigo='$this->codigo'";
        $objDatos->ejecutar($sql);
        $objDatos->cerrarconexion();
    }

}

?>
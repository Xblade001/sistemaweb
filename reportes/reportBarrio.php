<?php
require_once("../modelos/clsDatos.php");
$reporte = new clsDatos();
$sql = "select * from barrio order by bar_codigo";
$resultado = $reporte->filtro($sql);

$cboPais = new clsDatos();
$cboCiudad = new clsDatos();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reporte</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/tablas.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="datagrid">
            <table id ="datagrid">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($columna = $reporte->proximo($resultado)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $columna['bar_codigo'] ?>
                            </td>
                            <td>
                                <?php echo $columna['bar_descrip'] ?>
                            </td>
                            <td>
                                <?php
                                $c = $columna['ciud_codigo'];
                                $sql2 = "select * from ciudad where ciud_codigo='$c'";
                                $resultado3 = $cboCiudad->filtro($sql2);
                                $columna3 = $cboCiudad->proximo($resultado3);
                                echo $columna3['ciud_descrip'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $p = $columna3['pais_codigo'];
                                $sql4 = "select * from pais where pais_codigo='$p'";
                                $resultado2 = $cboPais->filtro($sql4);
                                $columna2 = $cboPais->proximo($resultado2);
                                echo $columna2['pais_descrip'];
                                ?>
                            </td>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </body>
</html>
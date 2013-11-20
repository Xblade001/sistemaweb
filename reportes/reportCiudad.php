<?php
require_once("../modelos/clsDatos.php");
$reporte = new clsDatos();
$sql = "select * from ciudad order by ciud_codigo";
$resultado = $reporte->filtro($sql);
$cboPais = new clsDatos();
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
                        <th>Pais</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($columna = $reporte->proximo($resultado)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $columna['ciud_codigo'] ?>
                            </td>
                            <td>
                                <?php echo $columna['ciud_descrip'] ?>
                            </td> 
                            <td>
                                <?php
                                $p = $columna['pais_codigo'];
                                $sql2 = "select * from pais where pais_codigo='$p'";
                                $resultado2 = $cboPais->filtro($sql2);
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
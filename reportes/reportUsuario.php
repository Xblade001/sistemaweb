<?php
require_once("../modelos/clsDatos.php");
$reporte = new clsDatos();
$sql = "select * from usuario order by usu_codigo";
$resultado = $reporte->filtro($sql);
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
                        <th>Login</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($columna = $reporte->proximo($resultado)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $columna['usu_codigo'] ?>
                            </td>
                            <td>
                                <?php echo $columna['usu_login'] ?>
                            </td> 
                            <td>
                                <?php echo $columna['usu_nombre'] ?>
                            </td>
                            <td>
                                <?php echo $columna['usu_apellido'] ?>
                            </td>
                            <td>
                                <?php echo $columna['usu_password'] ?>
                            </td>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php
require_once ("../modelos/clsDatos.php");
$cboPais = new clsDatos();
$sql = "select * from pais order by pais_codigo";
$resultado = $cboPais->filtro($sql);
$operacion = $_GET['lcOperacion'];
$listo = $_GET['lcListo'];
if ($operacion == 'buscar' && $listo == 1) {
    $lcCodigo = $_GET['lcCodigo'];
    $lcDescrip = $_GET['lcDescrip'];
    print("<script>function buscar2(){Buscar2();}window.onload = buscar2;</script>");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="../css/datepickercontrol.css" rel="stylesheet" type="text/css" />
        <title>Alta Ciudad</title>
        <script src='../js/validacionCiudad.js'></script>
        <script src='../js/datepickercontrol.js'></script>
        <script>
            function cargar()
            {
                var operacion = '<? print($operacion); ?>';
                var listo = '<? print($listo); ?>';
                mensajes(operacion, listo);
            }
            window.onload = cargar;
        </script>
    </head>
    <body>
        <div id="contenedorEst">
            <div id="cintillo">
            </div>
            <div id="banner">
            </div>
            <div id="menu">
            </div>
            <div id="contenido">
                <div id="cuadro">
                    <h1>Alta Ciudad</h1>
                    <div id="texto">
                        <form name='form1' method='post' action='../controladores/corCiudad.php'>
                            <table border='1' align='center'>
                                <tr>
                                    <td align='right'>Codigo:</td>
                                    <td><input type='text' disabled='txtcodigo' name='txtcodigo' onBlur="perderfocus();" value='<?php print($lcCodigo); ?>'/></td>
                                </tr>
                                <tr>
                                    <td align='right'>Descripcion:</td>
                                    <td><input type='text' disabled='txtdescrip' name='txtdescrip' value='<?php print($lcDescrip); ?>' /></td>
                                </tr>
                                <tr>
                                    <td align='right'>Pais:</td>
                                    <td><select name ='cbo_Pais' disabled ='cbo_Pais'>
                                            <?php
                                            while ($columna = $cboPais->proximo($resultado)) {
                                                echo '<option value=' . $columna['pais_codigo'] . '/>' . $columna['pais_descrip'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <input type='hidden' name='txtoperacion' value='des'></td>
                            </table>
                            <table border='1' align='center'>
                                <tr>
                                    <td><input type='button' name='btnincluir' onclick='Incluir();' value='Incluir' /></td>
                                    <td><input type='button' name='btnbuscar' onclick='Buscar();' value='Buscar' /></td>
                                    <td><input type='button' name='btnmodificar' onclick='Modificar();' disabled value='Modificar' /></td>
                                    <td><input type='button' name='btneliminar' onclick='Eliminar();' disabled value='Eliminar' /></td>
                                    <td><input type='button' name='btnguardar' onclick='Guardar();' disabled value='Guardar' /></td>
                                    <td><input type='button' name='btncancelar' onclick='Cancelar();' disabled value='Cancelar' /></td>
                                    <td><input type="button" value="Reporte" onclick="window.open('../reportes/reportCiudad.php')"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="pie">
        </div>
    </body>
</html>
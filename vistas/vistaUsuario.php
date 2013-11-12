<?php
$operacion = $_GET['lcOperacion'];
$listo = $_GET['lcListo'];

if ($operacion == 'buscar' && $listo == 1) {
    $lcCodigo = $_GET['lcCodigo'];
    $lcLogin = $_GET['lcLogin'];
    $lcNombre = $_GET['lcNombre'];
    $lcApellido = $_GET['lcApellido'];
    $lcPassword = $_GET['lcPassword'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="../css/datepickercontrol.css" rel="stylesheet" type="text/css" />
        <title>Gestion de Usuario</title>
        <script src='../js/validacionUsuario.js'></script>
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
                    <h1>Gestion de Usuario</h1>
                    <div id="texto">
                        <form name='form1' method='post' action='../controladores/corUsuario.php'>
                            <table border='1' align='center'>
                                <tr>
                                    <td align='right'>Codigo:</td>
                                    <td><input type='text' disabled='txtcodigo' name='txtcodigo' onBlur="perderfocus();" value='<?php print($lcCodigo); ?>'/></td>
                                </tr>
                                <tr>
                                    <td align='right'>Login:</td>
                                    <td><input type='text' disabled='txtlogin' name='txtlogin' value='<?php print($lcLogin); ?>' /></td>
                                </tr>
                                <tr>
                                    <td align='right'>Nombre:</td>
                                    <td><input type='text' disabled='txtnombre' name='txtnombre' value='<?php print($lcNombre); ?>' /></td>
                                </tr>
                                <tr>
                                    <td align='right'>Apellido:</td>
                                    <td><input type='text' disabled='txtapellido' name='txtapellido' value='<?php print($lcApellido); ?>' /></td>
                                </tr>
                                <tr>
                                    <td align='right'>Password:</td>
                                    <td><input type='password' disabled='txtpassword' name='txtpassword' value='<?php print($lcPassword); ?>' /></td>
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
                                    <td><input type="button" value="Reporte" onclick="window.open('../reportes/reportUsuario.php')"/></td>
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
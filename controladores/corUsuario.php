<?php

require_once("../modelos/clsUsuario.php");

$lcCodigo = $_POST['txtcodigo'];
$lcLogin = $_POST['txtlogin'];
$lcNombre = $_POST['txtnombre'];
$lcApellido = $_POST['txtapellido'];
$lcPassword = $_POST['txtpassword'];
$lcOperacion = $_POST["txtoperacion"];

$lobjUsuario = new clsUsuario($lcCodigo, $lcLogin, $lcNombre, $lcApellido, $lcPassword);


if ($lcOperacion == "buscar") {
    if ($lobjUsuario->buscar()) {
        $lcCodigo = $lobjUsuario->get_codigo();
        $lcLogin = $lobjUsuario->get_login();
        $lcNombre = $lobjUsuario->get_nombre();
        $lcApellido = $lobjUsuario->get_apellido();
        $lcPassword = $lobjUsuario->get_pass();
        $lcListo = 1;
        echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcCodigo=$lcCodigo&lcLogin=$lcLogin&lcNombre=$lcNombre&lcApellido=$lcApellido&lcPassword=$lcPassword&lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}


if ($lcOperacion == "incluir") {
    if ($lobjUsuario->buscar()) {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 1;
        $lobjUsuario->incluir();
        echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}

if ($lcOperacion == "modificar") {
    $lobjUsuario->modificar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}

if ($lcOperacion == "eliminar") {
    $lobjUsuario->eliminar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaUsuario.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
?>
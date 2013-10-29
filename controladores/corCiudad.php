<?php

require_once("../modelos/clsCiudad.php");

$lcCodigo = $_POST['txtcodigo'];
$lcDescrip = $_POST['txtdescrip'];

$lcOperacion = $_POST["txtoperacion"];

$lobjCiudad = new clsCiudad($lcCodigo, $lcDescrip);


if ($lcOperacion == "buscar") {
    if ($lobjCiudad->buscar()) {
        $lcCodigo = $lobjCiudad->get_codigo();
        $lcDescrip = $lobjCiudad->get_descripcion();
        $lcListo = 1;
        echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcCodigo=$lcCodigo&lcDescrip=$lcDescrip&lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}


if ($lcOperacion == "incluir") {
    if ($lobjCiudad->buscar()) {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 1;
        $lobjCiudad->incluir();
        echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}

if ($lcOperacion == "modificar") {
    $lobjCiudad->modificar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}

if ($lcOperacion == "eliminar") {
    $lobjCiudad->eliminar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
?>
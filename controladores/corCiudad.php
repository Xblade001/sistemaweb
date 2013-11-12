<?php

require_once("../modelos/clsCiudad.php");

$lcCodigo = $_POST['txtcodigo'];
$lcDescrip = $_POST['txtdescrip'];
$lcPais = $_POST['cbo_Pais'];



$lcOperacion = $_POST["txtoperacion"];

$lobjCiudad = new clsCiudad($lcCodigo, $lcDescrip, $lcPais);


if ($lcOperacion == "buscar") {
    if ($lobjCiudad->buscar()) {
        $lcCodigo = $lobjCiudad->get_codigo();
        $lcDescrip = $lobjCiudad->get_descripcion();
        $lcPais = $lobjCiudad->get_pais();
        $lcListo = 1;
        echo "<script>
location.href=\"../vistas/vistaCiudad.php?lcCodigo=$lcCodigo&lcDescrip=$lcDescrip&lcPais=$lcPais&lcOperacion=$lcOperacion&lcListo=$lcListo\";
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
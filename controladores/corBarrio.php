<?php

require_once("../modelos/clsBarrio.php");
$lcCodigo = $_POST['txtcodigo'];
$lcDescrip = $_POST['txtdescrip'];
$lcCiudad = $_POST['cbo_Ciudad'];
$lcOperacion = $_POST["txtoperacion"];
$lobjBarrio = new clsBarrio($lcCodigo, $lcDescrip, $lcCiudad);
if ($lcOperacion == "buscar") {
    if ($lobjBarrio->buscar()) {
        $lcCodigo = $lobjBarrio->get_codigo();
        $lcDescrip = $lobjBarrio->get_descripcion();
        $lcCiudad = $lobjBarrio->get_ciudad();
        $lcListo = 1;
        echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcCodigo=$lcCodigo&lcDescrip=$lcDescrip&lcCiudad=$lcCiudad&lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}
if ($lcOperacion == "incluir") {
    if ($lobjBarrio->buscar()) {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 1;
        $lobjBarrio->incluir();
        echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}
if ($lcOperacion == "modificar") {
    $lobjBarrio->modificar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
if ($lcOperacion == "eliminar") {
    $lobjBarrio->eliminar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaBarrio.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
?>
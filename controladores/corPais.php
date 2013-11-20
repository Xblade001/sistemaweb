<?php

require_once("../modelos/clsPais.php");
$lcCodigo = $_POST['txtcodigo'];
$lcDescrip = $_POST['txtdescrip'];
$lcOperacion = $_POST["txtoperacion"];
$lobjPais = new clsPais($lcCodigo, $lcDescrip);
if ($lcOperacion == "buscar") {
    if ($lobjPais->buscar()) {
        $lcCodigo = $lobjPais->get_codigo();
        $lcDescrip = $lobjPais->get_descripcion();
        $lcListo = 1;
        echo "<script>
location.href=\"../vistas/vistaPais.php?lcCodigo=$lcCodigo&lcDescrip=$lcDescrip&lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaPais.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}
if ($lcOperacion == "incluir") {
    if ($lobjPais->buscar()) {
        $lcListo = 0;
        echo "<script>
location.href=\"../vistas/vistaPais.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    } else {
        $lcListo = 1;
        $lobjPais->incluir();
        echo "<script>
location.href=\"../vistas/vistaPais.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
    }
}
if ($lcOperacion == "modificar") {
    $lobjPais->modificar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaPais.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
if ($lcOperacion == "eliminar") {
    $lobjPais->eliminar();
    $lcListo = 1;
    echo "<script>
location.href=\"../vistas/vistaPais.php?lcOperacion=$lcOperacion&lcListo=$lcListo\";
</script>";
}
?>
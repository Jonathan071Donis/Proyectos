<?php
include("../../bd.php");

if ($_POST && isset($_POST['descripcionMedicamento'])) {
    $descripcionMedicamento = $_POST['descripcionMedicamento'];

    // Verificar si el medicamento ya existe en la base de datos
    $consulta = $conexion->prepare("SELECT * FROM `medicamentos` WHERE `descripcionMedicamentos` = :descripcionMedicamento");
    $consulta->bindParam(":descripcionMedicamento", $descripcionMedicamento);
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        echo "existe";
    } else {
        echo "no_existe";
    }
}
?>

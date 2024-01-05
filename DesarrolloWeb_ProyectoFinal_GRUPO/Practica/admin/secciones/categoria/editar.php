<?php
include("../../bd.php");

if (isset($_POST['nombreCategoria'])) {
    $nombreCategoria = $_POST['nombreCategoria'];

    // Verificar si la categoría ya existe en la base de datos.
    $consulta = $conexion->prepare("SELECT * FROM categorias WHERE nombre = :nombreCategoria");
    $consulta->bindParam(":nombreCategoria", $nombreCategoria);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        echo "existe";
    } else {
        echo "no_existe";
    }
}
?>

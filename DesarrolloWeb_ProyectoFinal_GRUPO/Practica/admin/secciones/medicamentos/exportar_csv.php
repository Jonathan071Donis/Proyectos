<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $fechaInicio = (isset($_GET['fechaInicio'])) ? $_GET['fechaInicio'] : "";
    $fechaFin = (isset($_GET['fechaFin'])) ? $_GET['fechaFin'] : "";

    // Consulta SQL para obtener los datos a exportar
    $sql = "SELECT m.ID, m.descripcionMedicamentos, m.categoria, m.proveedorMedicamentos, m.cantidadMedicamentso, m.unidad_medida, m.nivel_estanteria, m.posicion_estanteria
            FROM medicamentos AS m
            WHERE m.fecha_ingreso >= :fechaInicio AND m.fecha_ingreso <= :fechaFin";

    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(":fechaInicio", $fechaInicio);
    $sentencia->bindParam(":fechaFin", $fechaFin);
    $sentencia->execute();

    $reporteMedicamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Definir las cabeceras del archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="reporte_medicamentos.csv"');

    // Abrir el flujo de salida (output) para escribir el archivo CSV
    $output = fopen('php://output', 'w');

    // Agregar los encabezados al archivo CSV
    fputcsv($output, array('ID', 'Nombre del Medicamento', 'Categoría', 'Proveedor', 'Cantidad en Existencia', 'Unidad de Medida', 'Nivel de Estantería', 'Posición de Estantería'));

    // Llenar el archivo CSV con los datos
    foreach ($reporteMedicamentos as $medicamento) {
        fputcsv($output, $medicamento);
    }

    // Cerrar el flujo de salida
    fclose($output);
    exit;
}

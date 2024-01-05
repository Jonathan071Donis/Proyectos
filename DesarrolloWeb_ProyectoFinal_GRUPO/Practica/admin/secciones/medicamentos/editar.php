<?php
include("../../bd.php");

// Consulta para el reporte de medicamentos próximos a vencer
$fechaActual = date('Y-m-d');
$sentencia = $conexion->prepare("SELECT m.ID, m.descripcionMedicamentos, m.categoria, m.proveedorMedicamentos, 
    m.cantidadMedicamentso, m.precioCompraMedicamentos, m.precioVentaMedicamentos, m.estadoMedicamentos, 
    m.lote_Medicamentos, m.fecha_ingreso, m.fecha_vencimiento, m.unidad_medida, m.nivel_estanteria, m.posicion_estanteria
    FROM medicamentos AS m
    WHERE m.fecha_vencimiento >= :fechaActual AND m.fecha_vencimiento <= DATE_ADD(:fechaActual, INTERVAL 30 DAY)");
$sentencia->bindParam(":fechaActual", $fechaActual);
$sentencia->execute();

$reporteProximosAVencer = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Definir las cabeceras del archivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="reporte_medicamentos_proximos_a_vencer.csv"');

// Abrir el flujo de salida (output) para escribir el archivo CSV
$output = fopen('php://output', 'w');

// Agregar los encabezados al archivo CSV
fputcsv($output, array(
    'ID', 'Nombre del Medicamento', 'Categoría', 'Proveedor', 'Cantidad en Existencia', 
    'Precio Compra Medicamento', 'Precio Venta Medicamento', 'Estado Medicamento', 
    'Lote Medicamento', 'Fecha Ingreso', 'Fecha Vencimiento', 'Unidad de Medida', 
    'Nivel de Estantería', 'Posición de Estantería'
));

// Llenar el archivo CSV con los datos
foreach ($reporteProximosAVencer as $medicamento) {
    fputcsv($output, $medicamento);
}

// Cerrar el flujo de salida
fclose($output);
exit;

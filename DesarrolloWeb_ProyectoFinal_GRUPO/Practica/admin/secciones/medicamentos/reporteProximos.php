<?php
include("../../bd.php");

$reporteMedicamentos = [];  // Inicializamos el arreglo para evitar errores

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $fechaInicio = (isset($_GET['fechaInicio'])) ? $_GET['fechaInicio'] : "";
    $fechaFin = (isset($_GET['fechaFin'])) ? $_GET['fechaFin'] : "";

    // Consulta SQL para el reporte por rango de fecha
    $sql = "SELECT m.ID, m.descripcionMedicamentos, m.categoria, m.proveedorMedicamentos, m.cantidadMedicamentso, m.unidad_medida, m.nivel_estanteria, m.posicion_estanteria
            FROM medicamentos AS m
            WHERE m.fecha_ingreso >= :fechaInicio AND m.fecha_ingreso <= :fechaFin";

    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(":fechaInicio", $fechaInicio);
    $sentencia->bindParam(":fechaFin", $fechaFin);
    $sentencia->execute();

    $reporteMedicamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <h3>Reporte por Rango de Fecha</h3>
        <form action="reporteProximos.php" method="GET"> <!-- Asegúrate de que el formulario apunte correctamente a "reporte.php" -->
            <div class="form-row">
                <div class="col">
                    <input type="date" name="fechaInicio" class="form-control" placeholder="Fecha de Inicio">
                </div>
                <div class="col">
                    <input type="date" name="fechaFin" class="form-control" placeholder="Fecha de Fin">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Generar Reporte</button>
                </div>
                
                
<div class="col">
    <a href="exportar_csv.php?fechaInicio=<?php echo $fechaInicio; ?>&fechaFin=<?php echo $fechaFin; ?>" class="btn btn-success">Exportar a CSV</a>
</div>


            </div>
        </form>
    </div>
    <div class="card-body">
        <?php if (count($reporteMedicamentos) > 0) { ?>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del Medicamento</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Cantidad en Existencia</th>
                            <th scope="col">Unidad de Medida</th>
                            <th scope="col">Nivel de Estantería</th>
                            <th scope="col">Posición de Estantería</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reporteMedicamentos as $medicamento) { ?>
                            <tr>
                                <td><?php echo $medicamento['ID']; ?></td>
                                <td><?php echo $medicamento['descripcionMedicamentos']; ?></td>
                                <td><?php echo $medicamento['categoria']; ?></td>
                                <td><?php echo $medicamento['proveedorMedicamentos']; ?></td>
                                <td><?php echo $medicamento['cantidadMedicamentso']; ?></td>
                                <td><?php echo $medicamento['unidad_medida']; ?></td>
                                <td><?php echo $medicamento['nivel_estanteria']; ?></td>
                                <td><?php echo $medicamento['posicion_estanteria']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <p>No se encontraron datos en el rango de fechas especificado.</p>
        <?php } ?>
    </div>
</div>

<?php
include("../../templates/footer.php");
?>

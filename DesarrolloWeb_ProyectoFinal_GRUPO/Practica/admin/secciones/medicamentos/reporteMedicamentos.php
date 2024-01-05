<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Borrar el registro con el ID correspondiente
    $sentencia = $conexion->prepare("DELETE FROM medicamentos WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}

// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM medicamentos ORDER BY ID ASC");
$sentencia->execute();

$lista_medicamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Consulta para el reporte de medicamentos próximos a vencer
$fechaActual = date('Y-m-d');
$sentencia = $conexion->prepare("SELECT m.ID, m.descripcionMedicamentos, m.categoria, m.proveedorMedicamentos, 
    m.cantidadMedicamentso, m.unidad_medida, m.nivel_estanteria, m.posicion_estanteria, 
    m.fecha_ingreso, m.fecha_vencimiento, 
    IFNULL(m.lote_Medicamentos, '') AS lote_Medicamentos,
    IFNULL(m.precioCompraMedicamentos, '') AS precioCompraMedicamentos,
    IFNULL(m.precioVentaMedicamentos, '') AS precioVentaMedicamentos,
    IFNULL(m.estadoMedicamentos, '') AS estadoMedicamentos
    FROM medicamentos AS m
    WHERE m.fecha_vencimiento >= :fechaActual AND m.fecha_vencimiento <= DATE_ADD(:fechaActual, INTERVAL 30 DAY)");
$sentencia->bindParam(":fechaActual", $fechaActual);
$sentencia->execute();

$reporteProximosAVencer = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="export-button">
    <a href="exportar_csv_medicamentos.php" class="btn btn-success">Exportar a CSV</a>
</div>

    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                    
                        <th scope="col">Descripcion del Medicamento</th>
                        <th scope="col">Lote Medicamento</th>
                        <th scope="col">Catidad Medicamento</th>
                        <th scope="col">Precio Compra Medicamento</th>
                        <th scope="col">Precio Venta Medicamento</th>
                        <th scope="col">Estado Medicamento</th>
                        <th scope="col">Proveedor Medicamento</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Fecha Vencimiento</th>
                        <th scope="col">Unidad de Medida</th>
                        <th scope="col">Nivel de Estanteria</th>
                        <th scope="col">Posicion Estanteria</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reporteProximosAVencer as $medicamento) { ?>
                        <tr>
                            <td><?php echo $medicamento['ID']; ?></td>
                          
                            <td><?php echo $medicamento['descripcionMedicamentos']; ?></td>
                            <td><?php echo $medicamento['lote_Medicamentos']; ?></td>
                            <td><?php echo $medicamento['cantidadMedicamentso']; ?></td>
                            <td><?php echo $medicamento['precioCompraMedicamentos']; ?></td>
                            <td><?php echo $medicamento['precioVentaMedicamentos']; ?></td>
                            <td><?php echo $medicamento['estadoMedicamentos']; ?></td>
                            <td><?php echo $medicamento['proveedorMedicamentos']; ?></td>
                            <td><?php echo $medicamento['categoria']; ?></td>
                            <td><?php echo $medicamento['fecha_ingreso']; ?></td>
                            <td><?php echo $medicamento['fecha_vencimiento']; ?></td>
                            <td><?php echo $medicamento['unidad_medida']; ?></td>
                            <td><?php echo $medicamento['nivel_estanteria']; ?></td>
                            <td><?php echo $medicamento['posicion_estanteria']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $medicamento['ID']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $medicamento['ID']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php
include("../../templates/footer.php");
?>
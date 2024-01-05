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

$lista_medicamentos= $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
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
                    <?php foreach ($lista_medicamentos as $registros) { ?>
                        <tr>
                        <td><?php echo $registros['ID']; ?></td>
                        <td scope="col">
                                <img width="50" src="../../../assets/img/medicamentos/<?php echo $registros['imagen']; ?>" />
                            </td>
                        <td><?php echo $registros['descripcionMedicamentos']; ?></td>
                        <td><?php echo $registros['lote_Medicamentos']; ?></td>
                        <td><?php echo $registros['cantidadMedicamentso']; ?></td>
                        <td><?php echo $registros['precioCompraMedicamentos']; ?></td>
                        <td><?php echo $registros['precioVentaMedicamentos']; ?></td>
                        <td><?php echo $registros['estadoMedicamentos']; ?></td>
                        <td><?php echo $registros['proveedorMedicamentos']; ?></td>
                        <td><?php echo $registros['categoria']; ?></td>
                        <td><?php echo $registros['fecha_ingreso']; ?></td>
                        <td><?php echo $registros['fecha_vencimiento']; ?></td>
                        <td><?php echo $registros['unidad_medida']; ?></td>
                        <td><?php echo $registros['nivel_estanteria']; ?></td>
                        <td><?php echo $registros['posicion_estanteria']; ?></td>
                        <td>
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
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

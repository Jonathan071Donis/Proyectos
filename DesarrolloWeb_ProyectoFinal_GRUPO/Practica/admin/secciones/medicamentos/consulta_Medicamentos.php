<?php
include("../../bd.php");

// Seleccionar registros filtrados
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $filtro = [];

    if (!empty($_GET['ID'])) {
        $codigo = $_GET['ID'];
        $filtro[] = "ID = :ID";
    }
    if (!empty($_GET['descripcion'])) {
        $descripcion = '%' . $_GET['descripcion'] . '%';
        $filtro[] = "descripcionMedicamentos LIKE :descripcion";
    }
    if (!empty($_GET['lote'])) {
        $lote = $_GET['lote'];
        $filtro[] = "lote_Medicamentos = :lote";
    }
    // Repite este proceso para los otros filtros (fecha_ingreso, fecha_vencimiento, estado, etc.)

    if (!empty($filtro)) {
        $sql = "SELECT * FROM medicamentos WHERE " . implode(" AND ", $filtro);
        $sentencia = $conexion->prepare($sql);

        // Asociar los parámetros de los filtros
        if (!empty($_GET['ID'])) {
            $sentencia->bindParam(":ID", $ID);
        }
        if (!empty($_GET['descripcion'])) {
            $sentencia->bindParam(":descripcion", $descripcion);
        }
        if (!empty($_GET['lote'])) {
            $sentencia->bindParam(":lote", $lote);
        }
        // Asocia los parámetros para los otros filtros aquí

        $sentencia->execute();
        $lista_medicamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Si no se aplican filtros, selecciona todos los registros
        $sentencia = $conexion->prepare("SELECT * FROM medicamentos");
        $sentencia->execute();
        $lista_medicamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <h3>Filtrar Medicamentos</h3>
        <form action="index.php" method="GET">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="ID" class="form-control" placeholder="ID">
                </div>
                <div class="col">
                    <input type="text" name="descripcion" class "form-control" placeholder="Descripción">
                </div>
                <div class="col">
                    <input type="text" name="lote" class="form-control" placeholder="Lote">
                </div>
                <div class="col">
                    <input type="text" name="fecha_ingreso" class="form-control" placeholder="Fecha Ingreso">
                </div>
                <div class="col">
                    <input type="text" name="fecha_vencimiento" class="form-control" placeholder="Fecha Vencimiento">
                </div>
                <div class="col">
                    <select name="estado" class="form-control">
                        <option value="">Estado</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
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
</div>

<?php
include("../../templates/footer.php");
?>
<?php
include("../../bd.php");

// Verificar si se ha enviado el formulario de filtro
if (isset($_GET['txtID']) || isset($_GET['txtNombre']) || isset($_GET['txtEstado'])) {
    // Obtener los valores de filtro
    $filtroID = isset($_GET['txtID']) ? $_GET['txtID'] : '';
    $filtroNombre = isset($_GET['txtNombre']) ? $_GET['txtNombre'] : '';
    $filtroEstado = isset($_GET['txtEstado']) ? $_GET['txtEstado'] : '';
    
    // Construir la consulta SQL con los criterios de filtro
    $consulta = "SELECT * FROM clientes WHERE 1";
    
    if (!empty($filtroID)) {
        $consulta .= " AND ID = '$filtroID'";
    }
    
    if (!empty($filtroNombre)) {
        $consulta .= " AND nombre LIKE '%$filtroNombre%'";
    }
    
    if (!empty($filtroEstado)) {
        $consulta .= " AND estado = '$filtroEstado'";
    }
    
    // Ejecutar la consulta SQL
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute();
    
    // Obtener los resultados
    $lista_clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Si no se han aplicado filtros, muestra todos los registros
    $sentencia = $conexion->prepare("SELECT * FROM clientes ORDER BY ID ASC");
    $sentencia->execute();
    $lista_clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">
        <!-- Formulario de filtros en el encabezado -->
        <form method="get" class="form-inline">
            <div class="form-group mr-3">
                <input type="text" name="txtID" placeholder="ID" class="form-control" value="<?= isset($_GET['txtID']) ? $_GET['txtID'] : '' ?>">
            </div>
            <div class="form-group mr-3">
                <input type="text" name="txtNombre" placeholder="Nombre" class="form-control" value="<?= isset($_GET['txtNombre']) ? $_GET['txtNombre'] : '' ?>">
            </div>
            <div class="form-group mr-3">
                <select name="txtEstado" class="form-control">
                    <option value="">Estado</option>
                    <option value="Activo" <?= (isset($_GET['txtEstado']) && $_GET['txtEstado'] === "Activo") ? "selected" : "" ?>>Activo</option>
                    <option value="Inactivo" <?= (isset($_GET['txtEstado']) && $_GET['txtEstado'] === "Inactivo") ? "selected" : "" ?>>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <?php if (count($lista_clientes) > 0) { ?>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">NIT</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Fecha de Ingreso</th>
                            <th scope="col">Fecha de Baja</th>
                            <th scope="col">Tipo de Cliente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_clientes as $registros) { ?>
                            <tr>
                                <td scope="col"><?= $registros['ID'] ?></td>
                                <td scope="col"><h6><?= $registros['nombre'] ?></h6></td>
                                <td scope="col"><?= $registros['estado'] ?></td>
                                <td scope="col">
                                    <img width="50" src="../../../assets/img/portfolio/<?= $registros['imagen'] ?>" />
                                </td>
                                <td scope="col"><?= $registros['direccion'] ?></td>
                                <td scope="col"><?= $registros['nit'] ?></td>
                                <td scope="col"><?= $registros['telefono'] ?></td>
                                <td scope="col"><?= $registros['fecha_ingreso'] ?></td>
                                <td scope="col"><?= $registros['fecha_baja'] ?></td>
                                <td scope="col"><?= $registros['tipo_cliente'] ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?= $registros['ID'] ?>" role="button">Editar</a>
                                    <a name="" id="" class="btn btn-danger" href="eliminar.php?txtID=<?= $registros['ID'] ?>" role="button">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <p>Ningún dato disponible en esta tabla.</p>
        <?php } ?>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php
include("../../templates/footer.php");
?>

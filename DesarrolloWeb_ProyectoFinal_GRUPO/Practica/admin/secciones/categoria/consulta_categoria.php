<?php
include("../../bd.php");

// Verificar si se ha enviado el formulario de filtro
if (isset($_GET['txtID']) || isset($_GET['txtNombre']) || isset($_GET['txtEstado'])) {
    // Obtener los valores de filtro
    $filtroID = isset($_GET['txtID']) ? $_GET['txtID'] : '';
    $filtroNombre = isset($_GET['txtNombre']) ? $_GET['txtNombre'] : '';
    $filtroEstado = isset($_GET['txtEstado']) ? $_GET['txtEstado'] : '';
    
    // Construir la consulta SQL con los criterios de filtro
    $consulta = "SELECT * FROM categoria WHERE 1";
    
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
    $lista_Categoria = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Si no se han aplicado filtros, muestra todos los registros
    $sentencia = $conexion->prepare("SELECT * FROM categoria ORDER BY ID ASC");
    $sentencia->execute();
    $lista_Categoria = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">
        <!-- Filtros en el encabezado -->
        <form method="get" class="form-inline mb-3">
            <div class="form-group mr-3">
                <input type="text" name="txtID" placeholder="ID" class="form-control" value="<?= isset($_GET['txtID']) ? $_GET['txtID'] : '' ?>">
            </div>
            <div class="form-group mr-3">
                <input type="text" name="txtNombreCategoria" placeholder="Nombre Categoría" class="form-control" value="<?= isset($_GET['txtNombreCategoria']) ? $_GET['txtNombreCategoria'] : '' ?>">
            </div>
            <div class="form-group mr-3">
                <select name="txtEstadoCategoria" class="form-control">
                    <option value="">Estado Categoría</option>
                    <option value="Activo" <?= (isset($_GET['txtEstadoCategoria']) && $_GET['txtEstadoCategoria'] === "Activo") ? "selected" : "" ?>>Activo</option>
                    <option value="Inactivo" <?= (isset($_GET['txtEstadoCategoria']) && $_GET['txtEstadoCategoria'] === "Inactivo") ? "selected" : "" ?>>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <div class="table-responsive">
            <table class="table table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Nombre Categoría</th>
                        <th scope="col">Estado Categoría</th>
                        <th scope="col">Fecha Ingreso Categoría</th>
                        <th scope="col">Fecha Baja Categoría</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_Categoria as $registros) { ?>
                        <tr>
                            <td scope="col"><?= $registros['ID']; ?></td>
                            <td scope="col"><?= $registros['icono']; ?></td>
                            <td><?= $registros['nombreCategoria']; ?></td>
                            <td><?= $registros['estadoCategoria']; ?></td>
                            <td><?= $registros['fechaIngresoCategoria']; ?></td>
                            <td><?= $registros['fechaBajaCategoria']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?= $registros['ID']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?= $registros['ID']; ?>" role="button">Eliminar</a>
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

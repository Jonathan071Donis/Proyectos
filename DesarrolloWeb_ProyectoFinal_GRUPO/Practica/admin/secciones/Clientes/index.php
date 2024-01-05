<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    
    // Consulta la imagen antes de eliminar el registro
    $sentencia = $conexion->prepare("SELECT imagen FROM clientes WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registros_imagen = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!empty($registros_imagen["imagen"])) {
        $ruta_imagen = "../../../assets/img/portfolio/" . $registros_imagen["imagen"];
        
        // Verifica si la imagen existe antes de eliminarla
        if (file_exists($ruta_imagen)) {
            unlink($ruta_imagen);
        }
    }

    // Elimina el registro de la base de datos
    $sentencia = $conexion->prepare("DELETE FROM clientes WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}

// Consulta todos los registros ordenados por ID de forma ascendente
$sentencia = $conexion->prepare("SELECT * FROM `clientes` ORDER BY ID ASC");
$sentencia->execute();
$lista_clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Dirrecion</th>
                        <th scope="col">Nit</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Fecha_ingreso</th>
                        <th scope="col">Fecha_baja</th>
                        <th scope="col">Tipo_cliente</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_clientes as $registros) { ?>
                        <tr>
                            <td scope="col"><?php echo $registros['ID']; ?></td>
                            <td scope="col"> <h6><?php echo $registros['nombre']; ?></h6> </td>
                                <td scope="col"> <?php echo $registros['estado']; ?> </td>
                                <td scope="col">
                                <img width="50" src="../../../assets/img/portfolio/<?php echo $registros['imagen']; ?>" />
                            </td>
                                <td scope="col">-<?php echo $registros['direccion']; ?> </td>
                            
                          
                            <td scope="col"><?php echo $registros['nit']; ?></td>
                            <td scope="col"><?php echo $registros['telefono']; ?>  </td>
                      
                            
                            <td scope="col">  <?php echo $registros['fecha_ingreso']; ?></td>
                                
                            <td scope="col"> <?php echo $registros['fecha_baja']; ?></td>
                                
                            <td scope="col"><?php echo $registros['tipo_cliente']; ?></td>
                              
                            </td>
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

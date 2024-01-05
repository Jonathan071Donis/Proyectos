<?php
include("../../bd.php");

if (!$conexion) {
    die("Error en la conexión a la base de datos");
}

$mensaje = "";

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM productos WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registros = $sentencia->fetch(PDO::FETCH_ASSOC);


        $icono = $registros['icono'];
        $nombre = $registros['nombre'];
        $descripcion = $registros['descripcion'];
        $ultimas_ventas_realizas = $registros['ultimas_ventas_realizas'];
        $productomas_vendidos = $registros['productomas_vendidos'];
        $productosProximos_vencer = $registros['productosProximos_vencer'];
  
    } 
    if ($_POST) {
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $icono = isset($_POST['icono']) ? $_POST['icono'] : "";
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
        $ultimas_ventas_realizas = isset($_POST['ultimas_ventas_realizas']) ? $_POST['ultimas_ventas_realizas'] : "";
        $productomas_vendidos = isset($_POST['productomas_vendidos']) ? $_POST['productomas_vendidos'] : "";
        $productosProximos_vencer = isset($_POST['productosProximos_vencer']) ? $_POST['productosProximos_vencer'] : "";

        $sentencia = $conexion->prepare("UPDATE productos SET icono=:icono, nombre=:nombre, descripcion=:descripcion, ultimas_ventas_realizas=:ultimas_ventas_realizas, productomas_vendidos=:productomas_vendidos, productosProximos_vencer=:productosProximos_vencer WHERE ID=:id");
        $sentencia->bindParam(":icono", $icono);
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":descripcion", $descripcion);
        $sentencia->bindParam(":ultimas_ventas_realizas", $ultimas_ventas_realizas);
        $sentencia->bindParam(":productomas_vendidos", $productomas_vendidos);
        $sentencia->bindParam(":productosProximos_vencer", $productosProximos_vencer);
          $sentencia->bindParam(":id", $txtID);

        if ($sentencia->execute()) {
            $mensaje = "Registro modificado con éxito.";
            header("Location: index.php?mensaje=" . $mensaje);
            exit();
        } else {
            echo "Error en la actualización: " . implode(", ", $sentencia->errorInfo());
        }
    }

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Editando la información de servicios
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input value="<?php echo htmlspecialchars($txtID); ?>" type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" readonly>
            </div>
            <div class="mb-3">
                <label for="icono" class="form-label">Icono</label>
                <input value="<?php echo $icono; ?>" type="text" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input value="<?php echo htmlspecialchars($nombre); ?>" type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class= "mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input value="<?php echo htmlspecialchars($descripcion); ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
                <label for="ultimas_ventas_realizas" class="form-label">Ultimas ventas Realizadas</label>
                <input value="<?php echo htmlspecialchars($ultimas_ventas_realizas); ?>" type="date" class="form-control" name="ultimas_ventas_realizas" id="ultimas_ventas_realizas" aria-describedby="helpId" placeholder="Ultimas ventas Realizadas">
            </div>

            <div class="mb-3">
                <label for="productomas_vendidos" class="form-label">Productos mas Vendidos</label>
                <input value="<?php echo htmlspecialchars($productomas_vendidos); ?>" type="text" class="form-control" name="productomas_vendidos" id="productomas_vendidos" aria-describedby="helpId" placeholder="Productos mas Vendidos">
            </div>

            <div class="mb-3">
                <label for="productosProximos_vencer" class="form-label">Productos Proximos a vencer</label>
                <input value="<?php echo htmlspecialchars($productosProximos_vencer); ?>" type="date" class="form-control" name="productosProximos_vencer" id="productosProximos_vencer" aria-describedby="helpId" placeholder="Productos Proximos a vencer">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php
include("../../templates/footer.php");
?>

<?php
include("../../bd.php");

$mensaje = ""; // Inicializa la variable del mensaje

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM proveedores WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $nombre = $registro['nombre'];
    $imagen = $registro['imagen'];
    $estado = $registro['estado'];
    $direccion = $registro['direccion'];
    $nit = $registro['nit'];
    $telefono = $registro['telefono'];
    $fecha_ingreso = $registro['fecha_ingreso'];
    $fecha_baja = $registro['fecha_baja'];
    $tipo_proveedor = $registro['tipo_proveedor'];
}

if ($_POST) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $fecha_ingreso = (isset($_POST['fecha_ingreso'])) ? $_POST['fecha_ingreso'] : "";
    $fecha_baja = (isset($_POST['fecha_baja'])) ? $_POST['fecha_baja'] : "";
    $tipo_proveedor = (isset($_POST['tipo_proveedor'])) ? $_POST['tipo_proveedor'] : "";

    // Verifica si se ha subido una nueva imagen
    if ($_FILES["imagen"]["tmp_name"] != "") {
        // Elimina la imagen anterior si existe
        if ($imagen != "") {
            $ruta_imagen_anterior = "../../../assets/img/about/" . $imagen;
            if (file_exists($ruta_imagen_anterior)) {
                unlink($ruta_imagen_anterior);
            }
        }

        $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";

        $fecha_imagen = new DateTime();
        $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

        $tmp_imagen = $_FILES["imagen"]["tmp_name"];

        move_uploaded_file($tmp_imagen, "../../../assets/img/about/" . $nombre_archivo_imagen);

        // Actualiza la base de datos con el nuevo nombre de imagen
        $sentencia = $conexion->prepare("UPDATE proveedores SET nombre=:nombre, estado=:estado, direccion=:direccion, nit=:nit, telefono=:telefono, fecha_ingreso=:fecha_ingreso, fecha_baja=:fecha_baja, tipo_proveedor=:tipo_proveedor, imagen=:imagen WHERE id=:id");
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":estado", $estado);
        $sentencia->bindParam(":direccion", $direccion);
        $sentencia->bindParam(":nit", $nit);
        $sentencia->bindParam(":telefono", $telefono);
        $sentencia->bindParam(":fecha_ingreso", $fecha_ingreso);
        $sentencia->bindParam(":fecha_baja", $fecha_baja);
        $sentencia->bindParam(":tipo_proveedor", $tipo_proveedor);
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen); // Agregamos el parámetro de la imagen
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        $mensaje = "Imagen actualizada con éxito."; // Mensaje de éxito
    } else {
        // Si no se subió una nueva imagen, solo actualiza los demás campos
        $sentencia = $conexion->prepare("UPDATE proveedores SET nombre=:nombre, estado=:estado, direccion=:direccion, nit=:nit, telefono=:telefono, fecha_ingreso=:fecha_ingreso, fecha_baja=:fecha_baja, tipo_proveedor=:tipo_proveedor WHERE id=:id");
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":estado", $estado);
        $sentencia->bindParam(":direccion", $direccion);
        $sentencia->bindParam(":nit", $nit);
        $sentencia->bindParam(":telefono", $telefono);
        $sentencia->bindParam(":fecha_ingreso", $fecha_ingreso);
        $sentencia->bindParam(":fecha_baja", $fecha_baja);
        $sentencia->bindParam(":tipo_proveedor", $tipo_proveedor);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
    }

    $mensaje = "Registro actualizado  con éxito.";
    header("Location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");


?>

<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text"
                    class="form-control"  readonly name="txtID" id="txtID" value="<?php echo $txtID; ?>" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $nombre ?>" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen:</label>
                <img width="50" src="../../../assets/img/about/<?php echo $imagen; ?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" value="<?php echo $estado ?>" name="estado" id="estado" aria-describedby="helpId" placeholder="Estado">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" value="<?php echo $direccion ?>" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Direccion">
            </div>
           
            <div class="mb-3">
                <label for="nit" class="form-label">NIT:</label>
                <input type="text" class="form-control" value="<?php echo $nit ?>"name="nit" id="nit" aria-describedby="helpId" placeholder="NIT">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control"value="<?php echo $telefono ?>" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Teléfono">
            </div>

            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso:</label>
                <input type="date" class="form-control"value="<?php echo $fecha_ingreso ?>" name="fecha_ingreso" id="fecha_ingreso" aria-describedby="helpId" placeholder="Fecha de Ingreso">
            </div>

            <div class="mb-3">
                <label for="fecha_baja" class="form-label">Fecha de Baja:</label>
                <input type="date" class="form-control"value="<?php echo $fecha_baja ?>" name="fecha_baja" id="fecha_baja" aria-describedby="helpId" placeholder="Fecha de Baja">
            </div>

            <div class="mb-3">
                <label for="tipo_proveedor" class="form-label">Tipo de Proveedor:</label>
                <input type="text" class="form-control" value="<?php echo $tipo_proveedor ?>"name="tipo_proveedor" id="tipo_proveedor" aria-describedby="helpId" placeholder="Tipo de Proveedor">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php
include("../../templates/footer.php");
?>

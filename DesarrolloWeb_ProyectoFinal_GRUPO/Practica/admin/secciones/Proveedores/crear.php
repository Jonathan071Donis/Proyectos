<?php
include("../../bd.php");

if ($_POST) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
    $fecha_ingreso = (isset($_POST['fecha_ingreso'])) ? $_POST['fecha_ingreso'] : "";
    $fecha_baja = (isset($_POST['fecha_baja'])) ? $_POST['fecha_baja'] : "";
    $tipo_proveedor = (isset($_POST['tipo_proveedor'])) ? $_POST['tipo_proveedor'] : "";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];

    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/about/" . $nombre_archivo_imagen);
    }

    $sentencia = $conexion->prepare("INSERT INTO `proveedores` (`ID`, `nombre`,`imagen`, `estado`,  `direccion`, `nit`, `telefono`, `fecha_ingreso`, `fecha_baja`, `tipo_proveedor`) 
    VALUES (NULL, :nombre,:imagen, :estado,  :direccion, :nit, :telefono, :fecha_ingreso, :fecha_baja, :tipo_proveedor);");

    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":estado", $estado);
    $sentencia->bindParam(":direccion", $direccion);
    $sentencia->bindParam(":nit", $nit);
    $sentencia->bindParam(":telefono", $telefono);
    $sentencia->bindParam(":fecha_ingreso", $fecha_ingreso);
    $sentencia->bindParam(":fecha_baja", $fecha_baja);
    $sentencia->bindParam(":tipo_proveedor", $tipo_proveedor);

    $sentencia->execute();
    $mensaje = "Registro agregado con éxito.";
    header("Location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Proveedores
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" name="estado" id="estado" aria-describedby="helpId" placeholder="Estado">
            </div>

                 <div class="mb-3">
                     <label for="direccion" class="form-label">Dirección:</label>
                     <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Dirección">
                </div>


            <div class="mb-3">
                <label for="nit" class="form-label">NIT:</label>
                <input type="text" class="form-control" name="nit" id="nit" aria-describedby="helpId" placeholder="NIT">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefono">
            </div>

            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" aria-describedby="helpId" placeholder="Fecha de Ingreso">
            </div>

            <div class="mb-3">
                <label for="fecha_baja" class="form-label">Fecha de Baja:</label>
                <input type="date" class="form-control" name="fecha_baja" id="fecha_baja" aria-describedby="helpId" placeholder="Fecha de Baja">
            </div>

            <div class="mb-3">
                <label for="tipo_proveedor" class="form-label">Tipo de Proveedor:</label>
                <input type="text" class="form-control" name="tipo_proveedor" id="tipo_proveedor" aria-describedby="helpId" placeholder="Tipo de Proveedor">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templates/footer.php");
?>

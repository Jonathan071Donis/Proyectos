<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_equipo WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $imagen = $registro['imagen'];
    $nombrecompleto = $registro['nombrecompleto'];
    $puesto = $registro['puesto'];
    $twiter = $registro['twiter'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];
}

if ($_POST) {
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombrecompleto = (isset($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $twiter = (isset($_POST['twiter'])) ? $_POST['twiter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    // Verificamos si se subió una nueva imagen
    if ($_FILES["imagen"]["tmp_name"] != "") {
        // Obtenemos la extensión del archivo
        $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

        // Elimina la imagen anterior si existe
        if ($imagen != "") {
            $ruta_imagen_anterior = "../../../assets/img/team/" . $imagen;
            if (file_exists($ruta_imagen_anterior)) {
                unlink($ruta_imagen_anterior);
            }
        }

        // Generamos un nombre único para la nueva imagen
        $nombre_archivo_imagen = time() . "_" . $txtID . "." . $extension;

        // Guarda la nueva imagen en la carpeta "team"
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../assets/img/team/" . $nombre_archivo_imagen);
    } else {
        // Si no se subió una nueva imagen, mantener la imagen existente
        $nombre_archivo_imagen = $registro['imagen'];
    }

    // Actualiza la entrada en la base de datos
    $sentencia = $conexion->prepare("UPDATE `tbl_equipo` SET imagen=:imagen, nombrecompleto=:nombrecompleto, puesto=:puesto, twiter=:twiter, facebook=:facebook, linkedin=:linkedin WHERE ID=:id");
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":nombrecompleto", $nombrecompleto);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":twiter", $twiter);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":linkedin", $linkedin);
    $sentencia->execute();

    $mensaje = "Registro actualizado con éxito.";
    header("Location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Integrantes del Equipo
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input type="text" class="form-control" readonly value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
                <img width="50" src="../../../assets/img/team/<?php echo $imagen; ?>" />
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
            </div>
            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
                <input type="text" class="form-control" value="<?php echo $nombrecompleto; ?>" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre Completo">
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" value="<?php echo $puesto; ?>" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">
            </div>
            <div class="mb-3">
                <label for="twiter" class="form-label">Twitter:</label>
                <input type="text" class="form-control" value="<?php echo $twiter; ?>" name="twiter" id="twiter" aria-describedby="helpId" placeholder="Twitter">
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" value="<?php echo $facebook; ?>" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">
            </div>
            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control" value="<?php echo $linkedin; ?>" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin">
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

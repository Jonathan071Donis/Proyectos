<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    
    $registros = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($registros) {
        $usuario = $registros['usuario'];
        $password = $registros['password'];
        $correo = $registros['correo'];
        $rol = isset($registros['Rol']) ? $registros['Rol'] : ""; // Verificar si 'rol' está definido
    } else {
        // Tratar el caso en el que no se encuentra el registro
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera los valores actualizados del formulario
        $nuevoUsuario = $_POST['usuario'];
        $nuevoPassword = $_POST['password'];
        $nuevoCorreo = $_POST['correo'];
        $nuevoRol = $_POST['Rol'];
        
        // Realiza la actualización en la base de datos
        $sentenciaActualizar = $conexion->prepare("UPDATE tbl_usuarios SET usuario = :usuario, password = :password, correo = :correo, Rol = :Rol WHERE id = :id");
        $sentenciaActualizar->bindParam(":usuario", $nuevoUsuario);
        $sentenciaActualizar->bindParam(":password", $nuevoPassword);
        $sentenciaActualizar->bindParam(":correo", $nuevoCorreo);
        $sentenciaActualizar->bindParam(":Rol", $nuevoRol);
        $sentenciaActualizar->bindParam(":id", $txtID);
        
        if ($sentenciaActualizar->execute()) {
            // Redirige a la página de inicio o muestra un mensaje de éxito
            header("Location: index.php");
            exit();
        } else {
            // Manejar errores en la actualización
        }
    }
}

include("../../templates/header.php");
?>
<!-- Resto de tu código HTML -->


<div class="card">
    <div class="card-header">
        Usuario
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input readonly type="text"
                    class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId"
                    placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre del usuario</label>
                <input type="text"
                    class="form-control" value="<?php echo $usuario; ?>" name="usuario" id="usuario" aria-describedby="helpId"
                    placeholder="Nombre del usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    class="form-control" value="<?php echo $password; ?>" name="password" id="password" aria-describedby="helpId"
                    placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email"
                    class="form-control" value="<?php echo $correo; ?>" name="correo" id="correo" aria-describedby="helpId"
                    placeholder="Correo">
            </div>
            <div class="mb-3">
                <label for="Rol" class="form-label">Rol</label>
                <input type="text"
                    class="form-control" value="<?php echo $rol; ?>" name="Rol" id="Rol" aria-describedby="helpId"
                    placeholder="Rol">
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

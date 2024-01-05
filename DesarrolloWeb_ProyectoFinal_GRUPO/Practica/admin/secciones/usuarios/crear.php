<?php
include("../../bd.php");

if ($_POST) {
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
    $Rol = (isset($_POST['Rol'])) ? $_POST['Rol'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`, `Rol`) 
    VALUES (NULL, :usuario, :password, :correo, :Rol);");

    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":Rol", $Rol);
    $sentencia->execute();
    $mensaje = "Usuario agregado con éxito.";
    header("Location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>
<div class="card">
    <div class="card-header">
        Usuario
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre del usuario</label>
                <input type="text" class="form-contRol" name="usuario" id="usuario" aria-describedby="helpId"
                    placeholder="Nombre del usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-contRol" name="password" id="password" aria-describedby="helpId"
                    placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-contRol" name="correo" id="correo" aria-describedby="helpId"
                    placeholder="Correo">
            </div>
            <div class="mb-3">
                <label for="Rol" class="form-label">Rol</label>
                <input type="text" class="form-contRol" name="Rol" id="Rol" aria-describedby="helpId" placeholder="Rol">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" Role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php
include("../../templates/footer.php");
?>

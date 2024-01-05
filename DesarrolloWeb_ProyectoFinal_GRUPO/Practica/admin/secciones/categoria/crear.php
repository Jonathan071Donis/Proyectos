<?php
include("../../bd.php");
if($_POST){



//Repcionamos los valores del formalario
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $nombreCategoria=(isset($_POST['nombreCategoria']))?$_POST['nombreCategoria']:"";
    $estadoCategoria =(isset($_POST['estadoCategoria']))?$_POST['estadoCategoria']:"";
    $fechaIngresoCategoria =(isset($_POST['fechaIngresoCategoria']))?$_POST['fechaIngresoCategoria']:"";
    $fechaBajaCategoria =(isset($_POST['fechaBajaCategoria']))?$_POST['fechaBajaCategoria']:"";
   
    


$sentencia=$conexion->prepare("INSERT INTO `categoria` (`ID`, `icono`, `nombreCategoria`, `estadoCategoria`, `fechaIngresoCategoria`, `fechaBajaCategoria`) VALUES 
(NULL,  :icono, :nombreCategoria, :estadoCategoria, :fechaIngresoCategoria, :fechaBajaCategoria);");

$sentencia->bindParam(":icono",$icono);
$sentencia->bindParam(":nombreCategoria",$nombreCategoria);
$sentencia->bindParam(":estadoCategoria",$estadoCategoria);
$sentencia->bindParam(":fechaIngresoCategoria",$fechaIngresoCategoria);
$sentencia->bindParam(":fechaBajaCategoria",$fechaBajaCategoria);





$sentencia->execute();
$mensaje = "Registro agregado  con éxito.";
header("Location: index.php?mensaje=" . $mensaje);

}


include("../../templates/header.php");
?>



<div class="card">
    <div class="card-header">
        Crear servicios
    </div>
    <div class="card-body">
  

<form action=""enctype="multipart/form-data" method="post">
<div class="mb-3">
  <label for="icono" class="form-label">Icono</label>
  <input type="text"
    class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">

</div>
<div class="mb-3">
    <label for="nombreCategoria" class="form-label">Nombre Categoria</label>
    <input type="text" class="form-control" name="nombreCategoria" id="nombreCategoria" aria-describedby="helpId" placeholder="Nombre Categoria" onblur="validarCategoria(this)">
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
function validarCategoria(input) {
    var nombreCategoria = input.value;
    if (nombreCategoria.trim() === "") {
        return;
    }

    // Realizar una solicitud AJAX para verificar si ya existe la categoría en la base de datos.
    $.ajax({
        type: 'POST',
        url: 'verificar_categoria.php', // Ruta al archivo PHP que verifica la categoría.
        data: { nombreCategoria: nombreCategoria },
        success: function (response) {
            if (response === "existe") {
                alert("Esta categoría ya existe en la base de datos. Por favor, ingresa otro nombre.");
                input.value = '';
            }
        },
    });
}
</script>


<div class="mb-3">
    <label for="estadoCategoria" class="form-label">Estado Categoria</label>
    <select class="form-select" name="estadoCategoria" id="estadoCategoria">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>
</div>



<div class="mb-3">
    <label for="fechaIngresoCategoria" class="form-label">Fecha ingreso categoria</label>
    <input type="date" class="form-control" name="fechaIngresoCategoria" id="fechaIngresoCategoria" aria-describedby="helpId" placeholder="Fecha ingreso categoria" min="<?php echo date('Y-m-d'); ?>">
</div>



<div class="mb-3">
  <label for="fechaBajaCategoria" class="form-label">Fecha Baja Categoria</label>
  <input type="date"
    class="form-control" name="fechaBajaCategoria" id="fechaBajaCategoria" aria-describedby="helpId" placeholder="Fecha Baja Categoria">

</div>




<button type="submit" class="btn btn-success">Agregar</button>

<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>


    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>




<?php
include("../../templates/footer.php");
?>
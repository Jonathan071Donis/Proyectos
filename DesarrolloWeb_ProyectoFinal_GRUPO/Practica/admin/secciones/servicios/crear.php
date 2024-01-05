<?php
include("../../bd.php");
if($_POST){

  


//Repcionamos los valores del formalario
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $ultimas_ventas_realizas =(isset($_POST['ultimas_ventas_realizas']))?$_POST['ultimas_ventas_realizas']:"";
    $productomas_vendidos =(isset($_POST['productomas_vendidos']))?$_POST['productomas_vendidos']:"";
    $productosProximos_vencer =(isset($_POST['productosProximos_vencer']))?$_POST['productosProximos_vencer']:"";
    


$sentencia=$conexion->prepare("INSERT INTO `productos` (`ID`, `icono`, `nombre`, `descripcion`, `ultimas_ventas_realizas`, `productomas_vendidos`, `productosProximos_vencer`) VALUES 
(NULL, :icono, :nombre, :descripcion, :ultimas_ventas_realizas, :productomas_vendidos, :productosProximos_vencer);");


$sentencia->bindParam(":icono",$icono);
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->bindParam(":ultimas_ventas_realizas",$ultimas_ventas_realizas);
$sentencia->bindParam(":productomas_vendidos",$productomas_vendidos);
$sentencia->bindParam(":productosProximos_vencer",$productosProximos_vencer);




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
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text"
    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">

</div>


<div class="mb-3">
  <label for="descripcion" class="form-label">Descripcion</label>
  <input type="text"
    class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">

</div>


<div class="mb-3">
  <label for="ultimas_ventas_realizas" class="form-label">Ultimas ventas Realizadas</label>
  <input type="date"
    class="form-control" name="ultimas_ventas_realizas" id="ultimas_ventas_realizas" aria-describedby="helpId" placeholder="Ultimas ventas Realizadas">

</div>

<div class="mb-3">
  <label for="productomas_vendidos" class="form-label">Productos mas Vendidos</label>
  <input type="text"
    class="form-control" name="productomas_vendidos" id="productomas_vendidos" aria-describedby="helpId" placeholder="Productos mas Vendidos">

</div>

<div class="mb-3">
  <label for="productosProximos_vencer" class="form-label">Prodcutos Proximos a vencer</label>
  <input type="date"
    class="form-control" name="productosProximos_vencer" id="productosProximos_vencer" aria-describedby="helpId" placeholder="Prodcutos Proximos a vencer">

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
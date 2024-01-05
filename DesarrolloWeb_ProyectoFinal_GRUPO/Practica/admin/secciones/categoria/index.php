<?php
include("../../bd.php");




if(isset($_GET['txtID'])){
//borrar dicho registro con el  ID correspondiente
echo$_GET['txtID'];
$txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";
$sentencia=$conexion->prepare("DELETE FROM categoria WHERE  id=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();

}
//seleccionar registros 
$sentencia = $conexion->prepare("SELECT * FROM categoria ORDER BY ID ASC");
$sentencia->execute();


$lista_Categoria=$sentencia->fetchAll(PDO::FETCH_ASSOC);





include("../../templates/header.php");






?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>

        
               
    <div class="card-body">
    
    <div class="table-responsive-sm">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">icono</th>
                    <th scope="col">Nombre Categoria</th>
                    <th scope="col">Estado Categoria</th>
                    <th scope="col">Fecha ingreso categoria</th>
                    <th scope="col">Fecha Baja Categoria</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
       <?php  foreach($lista_Categoria as $registros){  ?>
                <tr class="">
                    <td ><?php echo $registros['ID']; ?></td>
                    <td ><?php echo $registros['icono']; ?></td>
                    <td><?php echo $registros['nombreCategoria']; ?></td>
                    <td><?php echo $registros['estadoCategoria']; ?></td>
                    <td><?php echo $registros['fechaIngresoCategoria']; ?></td>
                    <td><?php echo $registros['fechaBajaCategoria']; ?></td>
                 
                    <td>
                        

                    <a name="" id="" class="btn btn-info"  href="editar.php?txtID=<?php echo $registros['ID']; ?> role="button">Editar</a>


                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?> role="button">Eliminar</a>
               



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
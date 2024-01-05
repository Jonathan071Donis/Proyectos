<?php 
$item=$_GET["id"];
include "../conexion.php";
$sql=mysqli_query($conectar,"delete from venta where item=$item");
echo mysqli_error($conectar);
header("Location: ventas.php");
; ?>
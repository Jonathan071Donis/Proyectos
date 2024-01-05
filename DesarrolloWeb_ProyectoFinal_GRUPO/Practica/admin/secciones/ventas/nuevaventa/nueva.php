<?php 
include "../conexion.php";
$sql=mysqli_query($conectar,"delete from venta");
header("Location: ventas.php")
; ?>
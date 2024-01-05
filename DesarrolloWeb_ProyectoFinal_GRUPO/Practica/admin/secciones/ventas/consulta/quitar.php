<?php 
$orden=$_GET["id"];
include "../conexion.php";
$sql=mysqli_query($conectar,"delete from ventas where orden=$orden");
echo mysqli_error($conectar);
header("Location: consulta.php");
; ?>
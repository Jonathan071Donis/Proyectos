<?php 
if (isset($_POST["facturar"])) {

include_once "../conexion.php";
$sql=mysqli_query($conectar,"Select * from venta");
if (mysqli_num_rows($sql)>0){
$sql=mysqli_query($conectar,"INSERT INTO `ventas`(`factura`, `cod_cliente`, `cliente`, `nit`, `descuento`, `fecha`, `tipo_de_pago`, `cod_producto`, `producto`, `unidad`, `precio`, `cantidad`, `sub_total`, `iva`, `total`) SELECT `factura`, `cod_cliente`, `cliente`, `nit`, `descuento`, `fecha`, `tipo_de_pago`, `cod_producto`, `producto`, `unidad`, `precio`, `cantidad`, `sub_total`, `iva`, `total` FROM venta ");


    $sql=mysqli_query($conectar,"INSERT INTO facturas (numero) select (`factura`) from venta order by factura ASC LIMIT 1 ");
   
   echo"<td ><a class='btn btn-info' href='imprimir/imprimir.php'>Imprimir Factura</a></td>";
   
}else{
    echo mysqli_error($conectar);
}
}
; ?>
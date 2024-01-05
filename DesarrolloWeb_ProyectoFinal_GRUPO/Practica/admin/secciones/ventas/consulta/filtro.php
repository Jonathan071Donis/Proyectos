<?php
$consulta = "SELECT * FROM ventas";
if (isset($_POST["filtro"])) {
   

$filtros = array();
$valores = array();

if (!empty($_POST['codigo_cliente'])) {
    $valor= intval($_POST['codigo_cliente']) ;
    $filtros[] = "cod_cliente = ".$valor;
    
}

if (!empty($_POST['nombre_cliente'])) {
    $valor = $_POST['nombre_cliente'];
    $filtros[] = "cliente LIKE '%".$valor."%'";
    
}

if (!empty($_POST['fecha'])) {
    $valor = $_POST['fecha'];
    $filtros[] = "fecha ='".$valor."'";
    
}
if (!empty($_POST['producto'])) {
    $valor = "'%" . $_POST['producto'] . "%'";
    $filtros[] = "producto LIKE ".$valor;
    
}
if (!empty($_POST['factura'])) {
    $valor = $_POST['factura'];
    $filtros[] = "factura = '".$valor."'";
    
}
if (!empty($_POST['orden'])) {
    $valor = intval($_POST['orden']);
    $filtros[] = "orden = ".$valor;
    
}


if (!empty($filtros)) {
    $consulta = "SELECT * FROM ventas WHERE " . implode(" AND ", $filtros );
}
    
}

include "../conexion.php";
  

                                $sql=mysqli_query($conectar,$consulta);
                                 
                                if ($sql) {
                                   
                                
                                while($bdatos=mysqli_fetch_assoc($sql)){

                                ?>
                                    <tr>
                                        
                                        <th scope="row"><?=  $bdatos["orden"]?></th>
                                        <td><?=$bdatos["factura"]?></td>
                                        <td><?=$bdatos["cod_cliente"]?></td>
                                        <td><?=$bdatos["cliente"]?></td>
                                        <td><?=$bdatos["fecha"]?></td>
                                        <td><?=$bdatos["producto"]?></td>
                                        <td><?=$bdatos["unidad"]?></td>
                                        <td><?=$bdatos["precio"]?></td>
                                        <td><?=$bdatos["cantidad"]?></td>
                                        <td><?=$bdatos["sub_total"]?></td>                                    
                                        <td><?=$bdatos["descuento"]?></td>
                                        <td><?=$bdatos["total"]?></td>
                                        <td><a class="btn btn-danger" href="quitar.php?id=<?=  $bdatos["orden"]?>">X</a></td>
                                    
                                    </tr>
                                <?php 
                                }
                               
                            }else{
                                echo  mysqli_error($conectar);
                                
                            }

                            
                                ?>
                                
                        



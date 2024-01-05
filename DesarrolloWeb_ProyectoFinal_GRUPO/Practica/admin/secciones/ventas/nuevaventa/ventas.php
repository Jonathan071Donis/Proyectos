<?php include("../../../templates/header.php");
    include "../conexion.php";
?>


<head>  
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>



<div class="row p-3">
        <div class="col-4 text-center">
            
            <form action="agregar.php" method="POST" class="row p-3" name="registrar">
                <?php 
                    $fact=1;
                    $sql0=mysqli_query($conectar,"SELECT MAX(id) as maximo_valor FROM facturas;");
                    if (mysqli_num_rows($sql0)>0) {
                        $result=mysqli_fetch_assoc($sql0);
                        $fact=intval($result['maximo_valor'])+1;

                    }

                            

                        $sql1=mysqli_query($conectar,"SELECT * FROM `venta`");
                        if (mysqli_num_rows($sql1)>0) {
                            $result=mysqli_fetch_assoc($sql1);
                            $c_cliente=$result['cod_cliente'];
                            $c_ncliente=$result['cliente'];
                            $c_nit=$result['nit'];
                            $c_fecha=$result['fecha'];
                            $c_pago=$result['tipo_de_pago'];
                        }else {
                            $c_cliente="";
                            $c_ncliente="Cliente";
                            $c_nit="";
                            $c_fecha="";
                            $c_pago="";
                        }
                        




                ; ?>
                <h2>Cliente</h2>
                <div class="p-3"><input type="text" name="factura" value="FAC<?php echo$fact?>" class="form-control"></div>
                    <div class="p-3"><select name="cliente" id="cliente" class="form-control">
                            <option value="<?=$c_cliente?>"><?=$c_ncliente?></option>
                            <?php 
                                $sql=mysqli_query($conectar,"SELECT * FROM clientes");

                                foreach ($sql as $datos) {
                                    ?>
                                        <option value="<?php echo $datos['ID']?>"><?php echo $datos['nombre']; ?></option>
                                    <?php
                                    
                                }

                            ?>
                            
                    

                
                </select></div>
                <div class="p-3"><input type="text" name="nit" placeholder="NIT" class="form-control" value="<?=$c_nit?>"></div>
                <div class="p-3"><input type="Date" name="fecha" placeholder="Fecha Venta" class="form-control" value="<?=$c_fecha?>"></div>
                <div class="p-3"><select name="pago" id="pago" class="form-control">
                    <option value="<?=$c_pago?>"><?=$c_pago?></option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>

                </select></div>
                <h2>Productos</h2>
                <div class="p-3"><select name="producto" id="producto" class="form-control">
                            <option value="">Producto</option>
                            <?php include "../conexion.php";
                                $sql=mysqli_query($conectar,"SELECT * FROM productos");

                                foreach ($sql as $datos) {
                                    ?>
                                        <option value="<?php echo $datos['ID']?>"><?php echo $datos['nombre']; ?></option>
                                    <?php
                                    
                                }

                            ?>
                        
                

                
                </select></div>
                <div class="p-3"><select name="unidad" id="unidad" class="form-control">
                    <option value="">Unidad</option>
                    <option value="Libra">Unidad</option>
                    <option value="Bolsa">Blister</option>
                    <option value="Litro">Frasco</option>

                </select></div>

                <div class="p-3"><input type="text" name="precio" placeholder="Precio" class="form-control"></div>
                <div class="p-3"><input type="text" name="cantidad" placeholder="Cantidad" class="form-control"></div>
                

                
            
            
                <button class="btn btn-warning" name="Agregar" type="submit" value="submit">Agregar</button>
              
            </form>
        </div>

        <!------------------------------------------------------------------------------------->
        <?php 
        $sql2=mysqli_query($conectar,"Select * from venta");
        if ($sql2) { ; ?>
        <div class="col-8">
        <h2 class="text-center p-2">Venta Actual</h2>
                <thead >
                    <form action="" method="post">
                    <tr class="">
                        <td ><button class="btn btn-info" name="facturar" type="submit" value="submit">Facturar</button></td>
                        <td ><a class="btn btn-info" href="nueva.php">Nueva Venta</a></td>
                        <?php include "facturar.php"; ?>
                        
                        
                    </tr>
                    </form>     
                </thead>
            
            
           
            <table class="table">
                    <thead >
                        <tr >
                            <th>Producto</th>
                            <th>Unidad</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>IVA</th>
                            <th>Descuento</th>
                            <th>Total</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <body>
                        <?php    
                                
                                while($bdatos=mysqli_fetch_assoc($sql2)){

                                ?>
                                    <tr>
                                        <th scope="row"><?=  $bdatos["producto"]?></th>
                                        <td><?=$bdatos["unidad"]?></td>
                                        <td><?=$bdatos["precio"]?></td>
                                        <td><?=$bdatos["cantidad"]?></td>
                                        <td><?=$bdatos["sub_total"]?></td>
                                        <td><?=$bdatos["iva"]?></td>
                                        <td><?=$bdatos["descuento"]?></td>
                                        <td><?=$bdatos["total"]?></td>
                                        <td><a class="btn btn-danger" href="quitar.php?id=<?=  $bdatos["item"]?>">X</a></td>
                                    
                                    </tr>
                                <?php 
                                }
        }
                                ?>
                                
                                <?php
                            
                        ?>
                    </body>
                    
    </table>
                
        </div> 
</div>






<?php include("../../../templates/footer.php"); ?>
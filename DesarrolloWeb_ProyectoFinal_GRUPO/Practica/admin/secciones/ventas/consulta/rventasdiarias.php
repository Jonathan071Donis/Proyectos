<?php include("../../../templates/header.php");
    include "../conexion.php";
?>
<head>  
    <title>Reporte Diario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<div class="row p-3 text-center">
    
    <form method="post" action="" class="row p-3">
    
    <div class=""> 
        
        <input type="date" name="fecha" placeholder="dia" class="">
        <button type="submit" class="btn btn-primary" name="generar">Generar</button>
    </div>
   
    
</form>
<?php if (isset($_POST["generar"])) {
   
    if (!empty($_POST["fecha"])) {
        
        $dia=$_POST["fecha"];
        $sql=mysqli_query($conectar,"Select * from ventas where fecha='$dia'");

        if ($sql) {
            ?>
</div>     
<div class="row p-2 text-center">

<div class="col-12  ">
<h3>Ventas del dia <?php echo $dia ?></h3>
<table class="table">
                    <thead >
                        <tr >
                            <th>Orden</th>
                            <th>Factura</th>
                            <th>Cliente</th>
                            <th>NIT</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Descuentos</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Tipo de pago</th>
                            
                            
                        </tr>
                    </thead>
                    <body><?php 
                    $totalvendido=0;
                    $totaldescuentos=0;
                    $ventas=0;

                    while($bdatos=mysqli_fetch_assoc($sql)){

?>
    <tr>
        
        <th scope="row"><?=  $bdatos["orden"]?></th>
        <td><?=$bdatos["factura"]?></td>
        <td><?=$bdatos["cliente"]?></td>
        <td><?=$bdatos["nit"]?></td>
        <td><?=$bdatos["producto"]?></td>
        <td><?=$bdatos["cantidad"]?></td>
        <td><?=$bdatos["descuento"]?></td>
        <td><?=$bdatos["total"]?></td>
        <td><?=$bdatos["fecha"]?></td> 
        <td><?=$bdatos["tipo_de_pago"]?></td>       
        
    
    </tr>
 <?php
    $totalvendido=$totalvendido+doubleval($bdatos["total"]);
    $totaldescuentos=$totaldescuentos+doubleval($bdatos["descuento"]);
    $ventas=$ventas+1;
 }
 ; ?>

    </body>
                    
    </table>
    <h2>Total de Ventas: <?=$ventas?></h2>
    <h2>Total Vendido: <?=$totalvendido?></h2>
    <h2>Total Descuentos: <?=$totaldescuentos?></h2>
    <a href="exportar.php?dia=<?= $dia ?>" class="btn btn-info">Exportar a PDF</a>
    </div>
</div>


            <?php



        }else{
            echo "<h2>No Hay datos del dia ".$fecha."</h2>";
        }
    }

}; ?>


<?php include("../../../templates/footer.php"); ?>
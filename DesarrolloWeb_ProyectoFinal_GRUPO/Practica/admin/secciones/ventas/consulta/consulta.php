<?php include("../../../templates/header.php");
    include "../conexion.php";
?>

<head>  
    <title>Consultar Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<div class="row p-2 text-center">
    <!-- Formulario para filtros -->
    <form method="post" action="" class="col-12">
        <!-- Campos para filtrar -->
        <input type="text" name="codigo_cliente" placeholder="Código Cliente">
        <input type="text" name="nombre_cliente" placeholder="Nombre Cliente">
        <input type="date" name="fecha" placeholder="Fecha Venta">
        <input type="text" name="producto" placeholder="producto">
        <input type="text" name="factura" placeholder="Factura">
        <input type="text" name="orden" placeholder="Orden">
        

        <!-- Agrega los demás campos que se necesiten para filtrar -->
        <button type="submit" class="btn btn-primary" name="filtro">Filtrar</button>
        <a href="rventasdiarias.php" class="btn btn-primary" name="diarias">Ventas Diarias</a>
        <a href="rventasmes.php" class="btn btn-primary" name="diarias">Ventas Mensual</a>
        

    </form>
    

</div>

<div class="row p-2">

<div class="col-12  ">

<table class="table">
                    <thead >
                        <tr >
                            <th>Orden</th>
                            <th>Factura</th>
                            <th>Cod_cliente</th>
                            <th>cliente</th>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Unidad</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            <th>Descuento</th>
                            <th>Total</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <body>
                        <?php include "filtro.php"; ?>
                    </body>
                    
    </table>
    </div>
</div>

<?php include("../../../templates/footer.php"); ?>
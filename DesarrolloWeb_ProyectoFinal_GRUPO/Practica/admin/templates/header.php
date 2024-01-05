<?php



session_start();
$url_base="http://localhost/Practica/admin/";
if(!isset($_SESSION['usuario'])){
  header("Location:".$url_base. "login.php");

}



?>


<!doctype html>
<html lang="en">

<head>
  <title>Administrador del sitio wed</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script type="text/javascript"   charset="utf8" src=" https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <header>
  


  <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
          <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/servicios/">Servicios</a>
          <div class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
            </a>
            <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/Clientes/index.php">Crud</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/Clientes/consultaClientes.php">Consulta</a>
            </div>
            </div>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Proveedor
            </a>
            
            <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/Proveedores/index.php">Crud</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/Proveedores/consulta_proveedor.php">Consulta</a>
            </div>
            </div>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categoria
            </a>
            
            <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/categoria/index.php">Crud</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/categoria/consulta_categoria.php">Consulta</a>
            </div>
            </div>
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Medicamentos
            </a>
            <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/medicamentos/index.php">Crud</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/medicamentos/consulta_Medicamentos.php">Consulta</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/medicamentos/reporteProximos.php">Reporte de Fecha</a>
                <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/medicamentos/reporteMedicamentos.php">Reporte Medicamentos</a>
                </div>
             
            </div>
            <div class="dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ventas
    </a>
    <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/ventas/nuevaventa/ventas.php">Nueva Venta</a>
        <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/ventas/consulta/consulta.php">Consultas</a>
         <a class="dropdown-item" href="<?php echo $url_base; ?>secciones/Reportes/reportecalendario.php/">ReporteGeneral</a>
        
    </div>
</div>

           
          

          <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/equipo/">Equipo</a>
          <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/configuraciones/">configuraciones</a>
          <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/usuarios/">Usuarios</a>
          <a class="nav-item nav-link" href="<?php echo $url_base; ?>cerrar.php">Cerrar sesion</a>
      </div>
  </nav>
  </header>
  <main clas="container">

  </main>
  <br/>
  <script >
<?php if(isset($_GET['mensaje'])){?>
Swal.fire({icon:"success",title:"<?php echo $_GET['mensaje']; ?>"});

<?php  } ?>
  </script>
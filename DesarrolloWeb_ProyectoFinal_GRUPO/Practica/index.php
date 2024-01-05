
<?php 
include("admin/bd.php");
//Seleccionar Registros de servicios
$sentencia=$conexion->prepare("SELECT * FROM `productos`" );

$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar Registros de portafolio
$sentencia=$conexion->prepare("SELECT * FROM `Clientes`" );

$sentencia->execute();
$lista_clientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar los datos de entradas 
$sentencia=$conexion->prepare("SELECT * FROM `proveedores`" );

$sentencia->execute();
$lista_proveedores=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//seleccionar los datos de entradas 
$sentencia=$conexion->prepare("SELECT * FROM `categoria`" );

$sentencia->execute();
$lista_categoria=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar los datos de entradas 
$sentencia=$conexion->prepare("SELECT * FROM `medicamentos`" );

$sentencia->execute();
$lista_medicamentos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar los datos de equipo 
$sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`" );

$sentencia->execute();
$lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar los datos de configuraciones 
$sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`" );

$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Farmacia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">



        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-left" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#page-top"><img src="assets/img/logoFarmacia.png" alt="..." /></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones del Menú
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#Productos">Productos</a>
                        <a class="dropdown-item" href="#portfolio">Clientes</a>
                        <a class="dropdown-item" href="#about">Proveedores</a>
                        <a class="dropdown-item" href="#Categoria">Categoria</a>
                        <a class="dropdown-item" href="#medicamentos">Medicamentos</a>
                        <a class="dropdown-item" href="#team">Equipo</a>
                        <a class="dropdown-item" href="#contact">Contacto</a>
                        <a class="dropdown-item" href="admin/login.php">Iniciar sesión</a>
                 
          
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


        <!-- Masthead-->
        <header class="masthead">

        <div class="container">
    <div class="masthead-subheading" style="font-weight: bold; color: black;"><?php echo $lista_configuraciones[0]['valor']; ?></div>
    <div class="masthead-heading text-uppercase" style="font-weight: bold; color: black;"><?php echo $lista_configuraciones[1]['valor']; ?></div>
    <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $lista_configuraciones[3]['valor']; ?>" style="font-weight: bold; color: black;"><?php echo $lista_configuraciones[2]['valor']; ?></a>
</div>

        </header>

<!-- Services -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #Productos {
            background-color: #fff;
            padding: 50px 0;
        }

        .section-heading {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .section-subheading {
            font-size: 18px;
            color: #777;
        }

        .Productos-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        .Productos-icon {
            font-size: 48px;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .Productos-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .Productos-description {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .Productos-stats {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <!-- Services -->
    <section class="page-section" id="Productos">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[4]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[5]['valor']; ?></h3>
            </div>

            <div class="row">
                <?php foreach ($lista_servicios as $registros) { ?>
                    <div class="col-md-4">
                        <div class="Productos-item">
                            <div class="Productos-icon">
                                <i class="fas <?php echo $registros["icono"]; ?>"></i>
                            </div>
                            <div class="Productos-title"><?php echo $registros["nombre"]; ?></div>
                            <div class="Productos-description">
                                <strong>Descripción:</strong><br>
                                <?php echo $registros["descripcion"]; ?>
                            </div>
                            <div class="Productos-stats">
                                <strong>Ultimas ventas Realizadas:</strong><br>
                                <?php echo $registros["ultimas_ventas_realizas"]; ?>
                            </div>
                            <div class="Productos-stats">
                                <strong>Productos más vendidos:</strong><br>
                                <?php echo $registros["productomas_vendidos"]; ?>
                            </div>
                            <div class="Productos-stats">
                                <strong>Productos Próximos a vencer:</strong><br>
                                <?php echo $registros["productosProximos_vencer"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>



        
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[6]['valor']; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[7]['valor']; ?></h3>
                </div>

                <div class="row">
                <?php foreach ($lista_clientes as $registros) { ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros["ID"]; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $registros["imagen"]; ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $registros["nombre"]; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $registros["estado"]; ?></div>
                            </div>
                        </div>
                    </div>






                    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros["ID"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $registros["nombre"]; ?></h2>
                                    <p class="item-intro text-muted"><?php echo $registros["estado"]; ?></p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $registros["imagen"]; ?>" alt="..." />
                                    <p> <strong>Direccion:</strong>
                                        <?php echo $registros["direccion"]; ?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Nit:</strong>
                                            <?php echo $registros["nit"]; ?>
                                        </li>
                                        <li>
                                            <strong>Telefono:</strong>
                                            <?php echo $registros["telefono"]; ?>
                                        </li>
                                        <li>
                                            <strong>Fecha de Ingreso:</strong>
                                            <?php echo $registros["fecha_ingreso"]; ?>
                                        </li>
                                        <li>
                                            <strong>Fecha de Baja:</strong>
                                            <?php echo $registros["fecha_baja"]; ?>
                                        </li>
                                        <li>
                                            <strong>Tipo de Cliente:</strong>
                                            <?php echo $registros["tipo_cliente"]; ?>
                                        </li>
                                      
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        CERRAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php } ?>
                


                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[8]['valor']; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[9]['valor']; ?></h3>
                </div>


                <ul class="timeline">
                <?php
                $contador=1;
                foreach ($lista_proveedores as $registros) {
                    
                    
                    ?>

                    <li  <?php echo (($contador%2)==0)?'class="timeline-inverted"':""; ?> >
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/<?php echo  $registros['imagen'] ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo  $registros['nombre'] ?></h4>
                                <div class="timeline-body"><p class="text-muted">
                                  <strong>Estado:</strong>
                                <?php echo  $registros['estado'] ?></p></div>
                               
                                  
                            </div>
                            <div class="timeline-body"><p class="text-muted"><strong>Direccion:</strong>
                                <?php echo  $registros['direccion'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Nit:</strong>
                                <?php echo  $registros['nit'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Telefono:</strong>
                                <?php echo  $registros['telefono'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Fecha de Ingreso:</strong>
                                <?php echo  $registros['fecha_ingreso'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Fecha de Baja:</strong>
                                <?php echo  $registros['fecha_baja'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Tipo de Proveedor:</strong>
                                <?php echo  $registros['tipo_proveedor'] ?></p></div>
                        </div>
                    </li>
                  
                    <?php 
                  $contador++;
                
                } ?>


                 

                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                </br>
                            <?php echo $lista_configuraciones[10]['valor']; ?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>



        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #Productos {
            background-color: #fff;
            padding: 50px 0;
        }

        .section-heading {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .section-subheading {
            font-size: 18px;
            color: #777;
        }

        .Productos-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        .Productos-icon {
            font-size: 48px;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .Productos-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .Productos-description {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .Productos-stats {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <!-- Services -->
    <section class="page-section" id="Categoria">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[11]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[12]['valor']; ?></h3>
            </div>

            <div class="row">
                <?php foreach ($lista_categoria as $registros) { ?>
                    <div class="col-md-4">
                        <div class="Productos-item">
                            <div class="Productos-icon">
                                <i class="fas <?php echo $registros["icono"]; ?>"></i>
                            </div>
                            <div class="Productos-title"><?php echo $registros["nombreCategoria"]; ?></div>
                            <div class="Productos-description">
                                <strong>Estado Categoria:</strong><br>
                                <?php echo $registros["estadoCategoria"]; ?>
                            </div>
                            <div class="Productos-stats">
                                <strong>Fecha ingreso categoria:</strong><br>
                                <?php echo $registros["fechaIngresoCategoria"]; ?>
                            </div>
                            <div class="Productos-stats">
                                <strong>Fecha Baja Categoria:</strong><br>
                                <?php echo $registros["fechaIngresoCategoria"]; ?>
                            </div>
                            
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>





<section class="page-section" id="medicamentos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[13]['valor']; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[14]['valor']; ?></h3>
                </div>


                <ul class="timeline">
                <?php
                $contador=1;
                foreach ($lista_medicamentos as $registros) {
                    
                    
                    ?>

                    <li  <?php echo (($contador%2)==0)?'class="timeline-inverted"':""; ?> >
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/medicamentos/<?php echo  $registros['imagen'] ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>   <?php echo $registros["descripcionMedicamentos"]; ?></h4>
                                <div class="timeline-body"><p class="text-muted">
                                  <strong>Lote Medicamento:</strong>
                                <?php echo  $registros['lote_Medicamentos'] ?></p></div>
                               
                                  
                            </div>
                            <div class="timeline-body"><p class="text-muted"><strong>Catidad Medicamento:</strong>
                                <?php echo  $registros['cantidadMedicamentso'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Precio Compra Medicamento:</strong>
                                <?php echo  $registros['precioCompraMedicamentos'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Precio Venta Medicamento:</strong>
                                <?php echo  $registros['precioVentaMedicamentos'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Estado Medicamento:</strong>
                                <?php echo  $registros['estadoMedicamentos'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Proveedor Medicamento:</strong>
                                <?php echo  $registros['proveedorMedicamentos'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Categoria:</strong>
                                <?php echo  $registros['categoria'] ?></p></div>


                                <div class="timeline-body"><p class="text-muted"><strong>Fecha Ingreso:</strong>
                                <?php echo  $registros['fecha_ingreso'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Fecha Vencimiento:</strong>
                                <?php echo  $registros['fecha_vencimiento'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Unidad de Medida:</strong>
                                <?php echo  $registros['unidad_medida'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Nivel de Estanteria:</strong>
                                <?php echo  $registros['nivel_estanteria'] ?></p></div>
                            <div class="timeline-body"><p class="text-muted"><strong>Posicion Estanteria:</strong>
                                <?php echo  $registros['posicion_estanteria'] ?></p></div>
                        </div>
                    </li>
                  
                    <?php 
                  $contador++;
                
                } ?>


                 

                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                </br>
                            <?php echo $lista_configuraciones[15]['valor']; ?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Team-->

        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[16]['valor']; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[17]['valor']; ?></h3>
                </div>


                <div class="row">
               <?php foreach ($lista_equipo as $registros) { ?> 
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/<?php echo $registros['imagen']?>" alt="..." />
                            <h4><?php echo $registros['nombrecompleto']?></h4>
                            <p class="text-muted"><?php echo $registros['puesto']?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['twiter']?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook']?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin']?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
 
               <?php } ?>
                </div>
             
            </div>
        </section>
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[18]['valor']; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[19]['valor']; ?></h3>
                </div>
               
            </div>
        </section>
                  

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Jonathan Donis &copy; octubre 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[20]['valor']; ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[21]['valor']; ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[22]['valor']; ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
  


        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

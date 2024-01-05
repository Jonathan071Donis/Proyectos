<?php
$servername = "localhost";
$username = "JDonis071";
$password = "Donis071";
$dbname = "final";

    $conectar=mysqli_connect($servername, $username,$password,$dbname);
    if (!$conectar) {
        echo "La conexion a la base de datos fallo";
    }
?>
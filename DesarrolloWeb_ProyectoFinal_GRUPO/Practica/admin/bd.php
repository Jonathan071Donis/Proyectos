<?php 

$servidor ="localhost";
 $baseDeDatos = "final";
 $usuario = "JDonis071";
 $contrasenia = "Donis071";

 try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
 echo"";


 }catch(Exception $error){

    echo $error->getMessage();


 }

 

?>
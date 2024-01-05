<?php

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

require_once("admin/bd.php");

$output = "";

if(ISSET($_POST['export']))
{
    $output .="
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>icono</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>ultimas_ventas_realizas</th>
                <th>productomas_vendidos</th>
                <th>productosProximos_vencer</th>
                </tr>
            <tbody>
    ";

            $query = mysqli_query($conn, "SELECT * FROM productos") or die(mysqli_errno());
            while($fetch = mysqli_fetch_array($query))
            {
                
            $output .= "
                        <tr>
                            <td>".utf8_decode($fetch['ID'])."</td>
                            <td>".utf8_decode($fetch['icono'])."</td>
                            <td>".utf8_decode($fetch['nombre'])."</td>
                            <td>".utf8_decode($fetch['descripcion'])."</td>
                            <td>".utf8_decode($fetch['ultimas_ventas_realizas'])."</td>
                            <td>".utf8_decode($fetch['productomas_vendidos'])."</td>
                            <td>".utf8_decode($fetch['productosProximos_vencer'])."</td>
                        </tr>
            ";
        }
            
            $output .="
                    </tbody>
                    
                </table>
            ";
    
    echo $output;
}

?>
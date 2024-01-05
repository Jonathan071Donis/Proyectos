<?php
require('../pdf/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    

    
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
if (isset($_GET["dia"])) {
    $fecha=$_GET["dia"];
    $this->Cell(30, 10, 'Reporte de ventas del dia '. $fecha, 0, 0, '');
}elseif (isset($_GET["mes"])) {
    $fecha=$_GET["mes"];
    $this->Cell(30, 10, 'Reporte de ventas del mes '. $fecha, 0, 0, '');
}
    

    $this->Ln(50);
        $this->Cell(20,10,"Orden",1,0,'C',0);
        $this->Cell(20,10,"Factura",1,0,'C',0);
        $this->Cell(40,10,"Cliente",1,0,'C',0);
        $this->Cell(20,10,"NIT",1,0,'C',0);
        $this->Cell(40,10,"Producto",1,0,'C',0);
        $this->Cell(15,10,"Cant",1,0,'C',0);
        $this->Cell(15,10,"Desc",1,0,'C',0);
        $this->Cell(15,10,"Total",1,0,'C',0);
        $this->Cell(20,10,"Fecha",1,0,'C',0);
        $this->Cell(20,10,"Pago",1,1,'C',0);
        
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AddPage('L', 'Letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',9);
include "../conexion.php";
if (isset($_GET["dia"])) {
    $fecha=$_GET["dia"];
    $sql=mysqli_query($conectar,"SELECT * FROM `ventas` where fecha='$fecha'");
}elseif (isset($_GET["mes"])) {
    $fecha=$_GET["mes"];
    $sql=mysqli_query($conectar,"SELECT * FROM `ventas` where fecha LIKE '%$fecha%'");
}


    if (mysqli_num_rows($sql)>0) {
        $totalvendido=0;
        $totaldescuentos=0;
        $ventas=0;
    foreach ($sql as $datos) {
        
       
        $pdf->Cell(20,10,utf8_decode($datos['orden']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['factura']),1,0,'C',0);
        $pdf->Cell(40,10,utf8_decode($datos['cliente']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['nit']),1,0,'C',0);
        $pdf->Cell(40,10,utf8_decode($datos['producto']),1,0,'C',0);
        $pdf->Cell(15,10,utf8_decode($datos['cantidad']),1,0,'C',0);
        $pdf->Cell(15,10,utf8_decode($datos['descuento']),1,0,'C',0);
        $pdf->Cell(15,10,utf8_decode($datos['total']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['fecha']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['tipo_de_pago']),1,1,'C',0);
      
        $totalvendido=$totalvendido+doubleval($datos["total"]);
        $totaldescuentos=$totaldescuentos+doubleval($datos["descuento"]);
        $ventas=$ventas+1;
        
    }
    $pdf->Cell(60, 7, 'Total de ventas: ' . $ventas,0, 1,'c');
    $pdf->Cell(60, 7, 'Total vendido: ' . $totalvendido,0, 1,'c');
    $pdf->Cell(60, 7, 'Total de Descuentos: ' . $totaldescuentos,0, 1,'c');

}
$pdf->Output();
mysqli_close($conectar);
?>
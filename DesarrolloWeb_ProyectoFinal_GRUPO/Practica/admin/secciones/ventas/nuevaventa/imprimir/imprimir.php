<?php
require('../../pdf/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    include "../../conexion.php";
    $sql=mysqli_query($conectar,"SELECT * FROM `venta`");

    if (mysqli_num_rows($sql)>0) {
        $datos=mysqli_fetch_assoc($sql);
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30, 10, 'Factura no.' . $datos['factura'], 0, 0, 'C');
    $this->Ln(40);
    $this->Cell(40, 10, 'Cliente: ' . $datos['cliente'], 0, 0);
    $this->Cell(60, 10, 'NIT: ' . $datos['nit'], 0, 1);
    $this->Cell(60, 10, 'Fecha: ' . $datos['fecha'], 0, 1);
    // Salto de línea
    $this->Ln(20);
   

        $this->Cell(10,10,"Item",1,0,'C',0);
        $this->Cell(60,10,"Producto",1,0,'C',0);
        $this->Cell(20,10,"Precio",1,0,'C',0);
        $this->Cell(15,10,"Cant",1,0,'C',0);
        $this->Cell(20,10,"Subtotal",1,0,'C',0);
        $this->Cell(20,10,"IVA",1,0,'C',0);
        $this->Cell(20,10,"Desc",1,0,'C',0);
        $this->Cell(25,10,"Total",1,1,'C',0);
        mysqli_close($conectar); 
    }
   

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
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',11);
include "../../conexion.php";
$sql=mysqli_query($conectar,"SELECT * FROM `venta`");

    if (mysqli_num_rows($sql)>0) {
    $item=1;
    $total=0;
    foreach ($sql as $datos) {
        
        $pdf->Cell(10,10,utf8_decode("$item"),1,0,'C',0);
        $pdf->Cell(60,10,utf8_decode($datos['producto']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['precio']),1,0,'C',0);
        $pdf->Cell(15,10,utf8_decode($datos['cantidad']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['sub_total']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['iva']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($datos['descuento']),1,0,'C',0);
        $subtotal=utf8_decode(doubleval($datos['total']));
        $pdf->Cell(25,10,utf8_decode($subtotal),1,1,'C',0);
        $item=$item+1;
        $total=$total+$subtotal;
        
    }
    $pdf->Cell(60, 30, 'Total: ' . $total,0, 1,'c');

}
$pdf->Output();
$sql=mysqli_query($conectar,"delete from venta");
mysqli_close($conectar);
?>
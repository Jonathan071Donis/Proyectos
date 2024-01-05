<?php
include("../../bd.php");
include("../../fpdf186/fpdf.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $query = "SELECT v.cod_producto, v.cantidad, v.descuento, v.sub_total, v.total, v.fecha
              FROM ventas v
              WHERE v.fecha BETWEEN :fecha_inicio AND :fecha_fin";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(":fecha_inicio", $fecha_inicio);
    $stmt->bindParam(":fecha_fin", $fecha_fin);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['generar_pdf'])) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        foreach ($resultados as $row) {
            $pdf->Cell(40, 10, 'Codigo Producto: ' . utf8_decode($row['cod_producto']));
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Cantidad: ' . $row['cantidad']);
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Descuento: ' . number_format($row['descuento'], 2));
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Subtotal: ' . number_format($row['sub_total'], 2));
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Total: ' . number_format($row['total'], 2));
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Fecha: ' . $row['fecha']);
            $pdf->Ln();
            $pdf->Ln();
        }

        $pdf->Output();
    }
} else {
    $resultados = array();
}
include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Reporte de Ventas
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success" name="generar_reporte">Generar Reporte</button>
            <button type="submit" class="btn btn-danger" name="generar_pdf">Exportar a PDF</button>
        </form>
    </div>
</div>

<?php if (!empty($resultados)) { ?>
    <div class="card mt-4">
        <div class="card-body">
            <h3>Resultados del Reporte</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo Producto</th>
                        <th>Cantidad</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $row) { ?>
                        <tr>
                            <td><?= utf8_decode($row['cod_producto']) ?></td>
                            <td><?= $row['cantidad'] ?></td>
                            <td><?= number_format($row['descuento'], 2) ?></td>
                            <td><?= number_format($row['sub_total'], 2) ?></td>
                            <td><?= number_format($row['total'], 2) ?></td>
                            <td><?= $row['fecha'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
<?php include("../../templates/footer.php"); ?>

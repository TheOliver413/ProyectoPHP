<?php
require('FPDF/fpdf.php');


class PDF extends FPDF{
// Cabecera de página
function Header(){
    // Logo
    //$this->Image('img/ingeambiental.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(15);
    // Título
    $this->Cell(167,10,'Reporte inventario herramientas "IngeAmbiental Ltda."',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'cn.php';    
$consulta = "SELECT * FROM herramientas";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row=$resultado->fetch_assoc()){
    $pdf->Cell(45,10,$row['Num'],1,0,'C',0);
    $pdf->Cell(45,10,$row['Cedula'],1,0,'C',0);
    $pdf->Cell(55,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(45,10,$row['Unidades'],1,1,'C',0);
}
$pdf->Output();
?>
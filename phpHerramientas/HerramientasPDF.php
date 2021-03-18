<?php
require('../FPDF/fpdf.php');


class PDF extends FPDF{
// Cabecera de página
function Header(){
    // Logo
    //$this->Image('img/ingeambiental.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    $this->SetTextColor(20,61,28);
    // Movernos a la derecha
    $this->Cell(15);
    // Título
    $this->Cell(167,10,'Reporte inventario herramientas "IngeAmbiental Ltda."',0,0,'C');
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
$pdf->SetFont('Arial','B',8);

    $pdf->Cell(15,10,utf8_decode('Num'),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode('Nombre'),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode('Descripción'),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode('Unidades'),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode('Precio'),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode('Vr_Total'),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode('Entradas'),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode('Salidas'),1,1,'C',0);

while($row=$resultado->fetch_assoc()){
    $pdf->Cell(15,10,utf8_decode($row['Num']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Descripcion']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['Unidades']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Precio']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Vr_Total']),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode($row['Entradas']),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode($row['Salidas']),1,1,'C',0);
}
$pdf->Output();
?>
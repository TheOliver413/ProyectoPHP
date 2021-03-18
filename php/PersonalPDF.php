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
    $this->SetDrawColor(80,80,80);
    $this->SetLineWidth(2);
    // Movernos a la derecha
    $this->Cell(30);
    // Título
    $this->Cell(220,10,'Reporte del personal "IngeAmbiental Ltda."',0,0,'C');
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
$consulta = "SELECT * FROM personal";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);


$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(80,80,80);
$pdf->Cell(20,10,utf8_decode('Cedula'),1,0,'C',0);
$pdf->Cell(20,10,utf8_decode('Nombre'),1,0,'C',0);
$pdf->Cell(20,10,utf8_decode('Apellido'),1,0,'C',0);
$pdf->Cell(20,10,utf8_decode('Telefono'),1,0,'C',0);
$pdf->Cell(30,10,utf8_decode('Dirección'),1,0,'C',0);
$pdf->Cell(30,10,utf8_decode('Cargo'),1,0,'C',0);
$pdf->Cell(25,10,utf8_decode('Tipo de Contrato'),1,0,'C',0);
$pdf->Cell(30,10,utf8_decode('Rol'),1,0,'C',0);
$pdf->Cell(25,10,utf8_decode('Cuenta Bancaria'),1,0,'C',0);
$pdf->Cell(55,10,utf8_decode('Contraseña'),1,1,'C',0);


while($row=$resultado->fetch_assoc()){
    $pdf->Cell(20,10,utf8_decode($row['Cedula']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['Apellido']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['Telefono']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Direccion']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Cargo']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['Tipo_de_contrato']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Rol']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['Cuenta_bancaria']),1,0,'C',0);
    $pdf->Cell(55,10,utf8_decode($row['Contraseña']),1,1,'C',0);
}
$pdf->Output();
?>
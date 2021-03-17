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
    $this->Cell(30);
    // Título
    $this->Cell(135,10,'Reporte del personal "IngeAmbiental Ltda."',1,0,'C');
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

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row=$resultado->fetch_assoc()){
    $pdf->Cell(20,10,$row['Cedula'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Apellido'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Telefono'],1,0,'C',0);
    $pdf->Cell(15,10,$row['Direccion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Cargo'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Tipo_de_contrato'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Rol'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Cuenta_bancaria'],1,0,'C',0);
    $pdf->Cell(15,10,$row['Contraseña'],1,1,'C',0);
}
$pdf->Output();
?>
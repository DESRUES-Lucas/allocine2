<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('../img/Mermoz-Rose.png',20,6,40);
    // Police Arial gras 15
    $this->SetFont('Arial','B',30);
    // Décalage à droite
    $this->Cell(70);
    // Titre
    $this->SetFillColor(240,107,201);
    $this->Cell(100,30,'Allocine',1,1,'C', 1);

    // Saut de ligne
    $this->Ln(20);

    $this->SetFillColor(240,107,201);
    $this->Cell(190,2,'',1,1,'C', 1);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>

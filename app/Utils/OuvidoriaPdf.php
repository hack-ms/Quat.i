<?php


namespace App\Utils;


use Codedge\Fpdf\Fpdf\Fpdf;

class OuvidoriaPdf extends Fpdf
{
    public function Header()
    {
        $this->SetY(5);
        $this->SetFont('Arial','B',12);
        $this->Cell(190,10,utf8_decode('Sua manifestação foi registrada com sucesso'),0,0,'C');$this->Ln(5);
        $this->SetLineWidth(0.5);

    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }
}
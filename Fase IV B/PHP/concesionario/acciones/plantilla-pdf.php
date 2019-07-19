<?php

require '../resources/libraries/fpdf181/fpdf.php';

class pdf extends FPDF {

    function  Header(){
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Reporte concesionario',0,0,'C');
        $this->Ln(20);
    }
    
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
}
<?php

namespace controllers\Admin;

use core\Controller;
use core\Request;
use core\setasign\fpdf\FPDF;

class FPDFController extends Controller
{

    public function PDFgenerator(Request $request){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();



    }

}


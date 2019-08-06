<?php
    require_once("../fpdf/fpdf.php");
    session_start();
    $pdf= new FPDF("L","pt","A4");
    $pdf->AddPage();
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(0,5,"Nome do Usuario: ".$_SESSION['user'],0,1,'L');
    $pdf->Ln(20);
    $pdf->Cell(0,5,"Email do Usuario: ".$_SESSION['email'],0,1,'L');
    $pdf->Ln(20);
    $pdf->Cell(0,5,"Arquivos: ",0,1,'L');
    $pdf->Ln(20);
    $dir = "../server/".$_SESSION['user'];
    $files = scandir($dir, 1);
    for ($cont=0; $cont < 2; $cont++) { 
        array_pop($files);
    }
    $files = array_reverse($files);
    $size = array();
    for ($cont=0; $cont < count($files); $cont++) { 
        array_push($size, filesize($dir."/".$files[$cont]));
    }
    for ($cont=0; $cont < count($files); $cont++) {
        $pdf->Cell(0,5,($cont+1).": ".$files[$cont],0,1,'L');
        $pdf->Ln(20);
    }
    $pdf->Output();
?>